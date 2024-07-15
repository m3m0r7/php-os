<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\IO;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Call;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Jz;
use PHPOS\Operation\Lodsb;
use PHPOS\Operation\Or_;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Standard\Return_;
use PHPOS\Service\ServiceInterface;

class PrintString implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);

        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $return = new Return_($this->code, $this);
        $printCharacter = new PrintCharacter($this->code, $this, $ac->high());

        return (new Instruction($this->code))
            ->include($printCharacter)
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                    $instruction
                        ->append(Lodsb::class)
                        ->append(Or_::class, $ac->low(), $ac->low())
                        ->append(Jz::class, $return)
                        ->append(Call::class, $printCharacter)
                        ->append(Jmp::class, $this)
            )
            ->include($return);
    }
}
