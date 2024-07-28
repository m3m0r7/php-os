<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\Operation\Hlt;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class DiskError implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                $instruction
                    ->include(
                        $serviceManager->
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
