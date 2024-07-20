<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\System;

use PHPOS\Operation\Hlt;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;

class Halt implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        return (new Instruction($this->code))
            ->append(Hlt::class);
    }
}
