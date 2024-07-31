<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\IO\PrintConstantString;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class PrintNewLine implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();
        $ax = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ax instanceof DataRegisterWithHighAndLowInterface);

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ax->high(), 0x0E)
                    ->append(Mov::class, $ax->low(), 0x0D)
                    ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)

                    ->append(Mov::class, $ax->high(), 0x0E)
                    ->append(Mov::class, $ax->low(), 0x0A)
                    ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)
            );
    }
}
