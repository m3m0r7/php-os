<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Runtime\KeyValueOption;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\Component\Formatter;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class SetVESABIOSExtensionInformation implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        [$video, $resolution] = $this->parameters + [null, VESA::VIDEO_640x480x32bpp];
        assert($video instanceof CodeInterface || $video === null);
        assert($resolution instanceof VESA);

        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $counter = $registers->get(RegisterType::COUNTER_BITS_32);
        assert($counter instanceof DataRegisterInterface);

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

        if ($video instanceof CodeInterface) {
            return (new Instruction($this->code, $serviceComponent))
                ->label(
                    $this->label(),
                    fn (InstructionInterface $instruction) => $instruction
                        ->append(Mov::class, $ac->value(), VESA::GET_INFO->value)
                        ->append(Mov::class, $counter->value(), $resolution->value | VESA::GRAPHIC_MODE)
                        ->append(Mov::class, $di->index(), $video->origin())
                        ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)
                );
        }

        $resb = $this->code->architecture()->runtime()
            ->reserveByte(Formatter::removeSign(static::class), 256);

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ac->value(), VESA::GET_INFO->value)
                    ->append(Mov::class, $counter->value(), $resolution->value | VESA::GRAPHIC_MODE)
                    ->append(Mov::class, $di->index(), $resb->name())
                    ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)
            );
    }
}
