<?php

declare(strict_types=1);

namespace PHPOS\Kernel;

use PHPOS\Bootloader\BootloaderInterface;

class Kernel implements KernelInterface
{
    public function __construct(protected BootloaderInterface $bootloader)
    {}
}
