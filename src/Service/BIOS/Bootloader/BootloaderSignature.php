<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Bootloader;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\OS\OSInfo;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Standard\DefineByte;
use PHPOS\Service\ServiceManagerInterface;
use PHPOS\Service\BIOS\Standard\Times;
use PHPOS\Service\ServiceInterface;

class BootloaderSignature implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        return (new Instruction($this->code, $serviceManager))
            ->include(
                $serviceManager->createService(
                    Times::class,
                    sprintf(
                        '%s-($-$$)',
                        // NOTE: After writing 2 bytes
                        (string) (OSInfo::BOOTLOADER_SIZE - 2),
                    ),
                    '0',
                ),
            )
            ->include(
                $serviceManager->createService(
                    DefineByte::class,
                    VariableType::BITS_16,
                    new Hex(0xAA55),
                ),
            );
    }
}
