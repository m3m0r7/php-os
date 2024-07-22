<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\IO\PrintConstantString;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\Component\Color256Set;
use PHPOS\Service\ServiceInterface;

class PrintCharacter implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        [$color256Set] = $this->parameters + [Color256Set::WHITE];
        assert($color256Set instanceof Color256Set);

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($base instanceof DataRegisterInterface);

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                $instruction
                    ->append(Mov::class, $ac->high(), 0x0E)
                    ->append(Mov::class, $base->value(), $color256Set->value)
                    ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)
                    ->append(Ret::class)
            );
    }
}
