<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Standard\Times;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class CodeSignature implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        return (new Instruction($this->code, $serviceComponent))
            ->include(
                $serviceComponent->createService(
                    Times::class,
                    sprintf(
                        '%s-($-$$)',
                        (string) (((int) $this->code->sectors()->value()) * \PHPOS\OS\OSInfo::PAGE_SIZE),
                    ),
                    '0',
                ),
            );
    }
}
