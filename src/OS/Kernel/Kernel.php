<?php

declare(strict_types=1);

namespace PHPOS\Kernel;

use PHPOS\OS\CodeInterface;

class Kernel implements KernelInterface
{
    public function __construct(protected CodeInterface $bootloader)
    {
    }
}
