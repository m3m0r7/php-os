<?php

declare(strict_types=1);

namespace PHPOS\Bootloader;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Assembly\AssemblyInterface;

interface BootloaderInterface
{
    public function architecture(): ArchitectureInterface;
    public function option(): OptionInterface;
    public function assemble(): AssemblyInterface;
    public function registerInitializationService(string $serviceName): BootloaderInterface;
    public function registerPostService(string $serviceName): BootloaderInterface;
}
