<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Assembly\AssemblyInterface;

interface CodeInterface
{
    public function architecture(): ArchitectureInterface;
    public function option(): OptionInterface;
    public function assemble(): AssemblyInterface;
    public function registerService(string $serviceName, mixed ...$parameters): CodeInterface;
    public function registerPostService(string $serviceName, mixed ...$parameters): CodeInterface;
}
