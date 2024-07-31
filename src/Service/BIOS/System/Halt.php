<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\System;

use PHPOS\Operation\Hlt;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class Halt implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        return (new Instruction($this->code, $serviceComponent))
            ->append(Hlt::class);
    }
}
