<?php

declare(strict_types=1);

namespace PHPOS\Bootloader;

use PHPOS\Architecture\ArchitectureInterface;

interface BootloaderInterface
{
    public function architecture(): ArchitectureInterface;
    public function option(): OptionInterface;
}
