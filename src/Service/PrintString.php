<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Operation\Call;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Jz;
use PHPOS\Operation\Lodsb;
use PHPOS\Operation\Or_;

class PrintString implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->bootloader->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);

        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $return = new Return_($this->bootloader, $this);
        $printCharacter = new PrintCharacter($this->bootloader, $this, $ac->high());

        return (new Instruction($this->bootloader))
            ->include($return)
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
            );
    }
}
