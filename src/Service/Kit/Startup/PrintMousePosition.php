<?php

declare(strict_types=1);

namespace PHPOS\Service\Kit\Startup;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Call;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString;
use PHPOS\Service\BIOS\IO\PrintNumberFromAX;
use PHPOS\Service\Component\Address\Indirect;
use PHPOS\Service\PCI\PS2\Mouse;
use PHPOS\Service\ServiceInterface;

class PrintMousePosition implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $mouse = new Mouse($this->code, $this);

        $mouseX = $this->code
            ->architecture()
            ->runtime()
            ->findReserveByte($mouse->label() . '_mouse_x');

        $mouseY = $this->code
            ->architecture()
            ->runtime()
            ->findReserveByte($mouse->label() . '_mouse_y');


        $stringX = (new PrintConstantString($this->code, $this, 'X: '))
            ->setLabelSuffix('x');

        $stringY = (new PrintConstantString($this->code, $this, 'Y: '))
            ->setLabelSuffix('y');

        $stringComma = (new PrintConstantString($this->code, $this, ', '))
            ->setLabelSuffix('comma');

        $stringSpace = (new PrintConstantString($this->code, $this, ' '))
            ->setLabelSuffix('space');

        $printNumberFromAX = new PrintNumberFromAX(
            $this->code,
            $this,
        );

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Call::class, $mouse->label() . '_init')
                    ->label(
                        $this->label() . '_main',
                        fn (InstructionInterface $instruction) => $instruction
                            ->append(Call::class, $mouse->label())
                            ->include($stringX)
                            ->append(Mov::class, $ac->value(), new Indirect($mouseX->name()))
                            ->append(Call::class, $printNumberFromAX->label())
                            ->include($stringSpace)
                            ->include($stringY)
                            ->append(Mov::class, $ac->value(), new Indirect($mouseY->name()))
                            ->append(Call::class, $printNumberFromAX->label())
                            ->include($stringComma)
                            ->append(Jmp::class, $this->label() . '_main')
                    ),
            )
            ->include($printNumberFromAX)
            ->include($mouse);
    }
}
