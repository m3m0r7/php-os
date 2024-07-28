<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk\LBA;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class LBAError implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        return (new Instruction($this->code, $serviceManager))
            ->append(Mov::class, $ac->high(), 0x00)
            ->append(Int_::class, BIOS::DISK_INTERRUPT->value)
            ->append(Jmp::class, $this->parent?->label() ?? '$');
    }
}
