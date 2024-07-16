<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\System;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Operation\Jmp;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Disk\LoadSector;
use PHPOS\Service\ServiceInterface;

class CallCode implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$code] = $this->parameters + [null];
        assert($code instanceof CodeInterface);

        $loadSector = new LoadSector(
            $this->code,
            null,
            $code,
        );

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                    $instruction
                        ->include($loadSector)
                        ->append(Jmp::class, new Hex($code->origin(), 16))
            );
    }
}