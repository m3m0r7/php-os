<?php
declare(strict_types=1);
namespace PHPOS\Architecture;

use PHPOS\Runtime\RuntimeInterface;

interface ArchitectureInterface
{
    public function runtime(): RuntimeInterface;
}