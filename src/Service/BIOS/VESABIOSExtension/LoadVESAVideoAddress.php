<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Mov;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\Component\Address\Indirect;
use PHPOS\Service\Component\Formatter;
use PHPOS\Service\ServiceInterface;

class LoadVESAVideoAddress implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$video] = $this->parameters + [null];
        assert($video instanceof CodeInterface || $video === null);

        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($base instanceof DataRegisterInterface);

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

        if ($video instanceof CodeInterface) {
            return (new Instruction($this->code))
                ->label(
                    $this->label(),
                    fn (InstructionInterface $instruction) => $instruction
                        ->append(Mov::class, $ac->value(), (string) new Indirect(
                            $video->origin() . ' + ' . VESA::PHYS_BASE_PTR_ADD,
                        ))
                        ->append(Mov::class, $di->index(), $ac->value())
                );
        }

        $resb = $this->code->architecture()->runtime()
            ->findReserveByte(Formatter::removeSign(SetVESABIOSExtensionInformation::class));

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ac->value(), (string) new Indirect(
                        $resb->name() . ' + ' . VESA::PHYS_BASE_PTR_ADD,
                    ))
                    ->append(Mov::class, $di->index(), $ac->value())
            );
    }
}
