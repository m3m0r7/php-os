<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Sub;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\Component\Address\Indirect;
use PHPOS\Service\Component\Formatter;
use PHPOS\Service\ServiceInterface;

class LoadVESAVideoAddress implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($base instanceof DataRegisterInterface);

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

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
                    ->append(Sub::class, $di->index(), VESA::VIDEO_1024x768x32bpp_WIDTH)
            );
    }
}