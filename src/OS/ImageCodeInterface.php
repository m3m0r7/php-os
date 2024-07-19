<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Assembly\AssemblyInterface;

interface ImageCodeInterface extends CodeInterface
{
    public function width(): int;
    public function height(): int;
}
