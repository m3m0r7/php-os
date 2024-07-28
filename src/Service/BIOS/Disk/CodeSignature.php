<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\OS\CodeInfo;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Standard\Times;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class CodeSignature implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        return (new Instruction($this->code, $serviceManager))
            ->include(new Times(
                $this->code,
                null,
                sprintf(
                    '%s-($-$$)',
                    (string) (((int) $this->code->sectors()->value()) * \PHPOS\OS\OSInfo::PAGE_SIZE),
                ),
                '0',
            ));
    }
}
