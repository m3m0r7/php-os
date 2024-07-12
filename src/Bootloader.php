<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Architecture;
use PHPOS\Architecture\ArchitectureInterface;

class Bootloader implements BootloaderInterface
{
    public function __construct(public readonly ArchitectureInterface $architecture) {

    }

    public function architecture(): ArchitectureInterface
    {
        return $this->architecture;
    }
}