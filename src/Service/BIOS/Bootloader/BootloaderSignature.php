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
use PHPOS\Service\ServiceManager\ServiceComponentInterface;
use PHPOS\Service\BIOS\Standard\Times;
use PHPOS\Service\ServiceInterface;

class BootloaderSignature implements ServiceInterface
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
                        // NOTE: After writing 2 bytes
                        (string) (OSInfo::BOOTLOADER_SIZE - 2),
                    ),
                    '0',
                ),
            )
            ->include(
                $serviceComponent->createService(
                    DefineByte::class,
                    VariableType::BITS_16,
                    new Hex(0xAA55),
                ),
            );
    }
}
