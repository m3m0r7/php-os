<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\ArchitectureInterface;

interface BootloaderInterface
{
    public function architecture(): ArchitectureInterface;
}