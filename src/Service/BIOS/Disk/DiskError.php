<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\Operation\Hlt;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString;
use PHPOS\Service\ServiceInterface;

class DiskError implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $printStringService = new PrintConstantString(
            $this->code,
            $this,
            'Load disk error!',
        );

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                $instruction
                    ->include($printStringService)
                    ->append(Hlt::class)
            );
    }
}
