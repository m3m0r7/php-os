<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\Operation\Hlt;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class DiskError implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                $instruction
                    ->include(
                        $serviceComponent->
                            createServiceWithParent(
                                PrintConstantString::class,
                                $this,
                                'Load disk error!',
                            ),
                    )
                    ->append(Hlt::class)
            );
    }
}
