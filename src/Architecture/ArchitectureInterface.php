<?php
declare(strict_types=1);
namespace PHPOS\Architecture;

use PHPOS\RuntimeInterface;

interface ArchitectureInterface
{
    public function runtime(): RuntimeInterface;
}