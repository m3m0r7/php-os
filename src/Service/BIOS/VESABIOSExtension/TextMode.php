<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class TextMode implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();
        $ax = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ax instanceof DataRegisterWithHighAndLowInterface);

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ax->value(), 0x03)
                    ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)
            );
    }
}
