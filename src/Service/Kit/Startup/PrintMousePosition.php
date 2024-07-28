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
use PHPOS\Service\ServiceManagerInterface;

class PrintMousePosition implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
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


        $stringX = $serviceManager->createServiceWithParent(
            PrintConstantString::class,
            $this,
            'X: ',
        );

        $stringY = $serviceManager->createServiceWithParent(
            PrintConstantString::class,
            $this,
            'Y: ',
        );

        $stringComma = $serviceManager->createServiceWithParent(
            PrintConstantString::class,
            $this,
            ', ',
        );

        $stringSpace = $serviceManager->createServiceWithParent(
            PrintConstantString::class,
            $this,
            ' ',
        );

        $printNumberFromAX = $serviceManager->createServiceWithParent(
            PrintNumberFromAX::class,
            $this,
        );

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        return (new Instruction($this->code, $serviceManager))
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
