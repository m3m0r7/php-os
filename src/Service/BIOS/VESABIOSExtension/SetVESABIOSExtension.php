<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\ServiceInterface;

class SetVESABIOSExtension implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ac->value(), VESA::SET_MODE->value)
                    ->append(Mov::class, $base->value(), VESA::VIDEO_1024x768x32bpp | VESA::GRAPHIC_MODE)
                    ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)
            );
    }
}
