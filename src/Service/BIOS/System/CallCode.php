<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\System;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Operation\Jmp;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Runtime\KeyValueInterface;
use PHPOS\Runtime\KeyValueOption;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Disk\LoadSector;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class CallCode implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        [$code] = $this->parameters + [null];
        assert($code instanceof CodeInterface);

        $loadSector = $serviceComponent->createServiceWithParent(
            LoadSector::class,
            $this,
            $code,
        );

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                    $instruction
                        ->include($loadSector)
                        ->append(Jmp::class, new Hex($code->origin(), 16))
            );
    }
}
