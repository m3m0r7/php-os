<?php

declare(strict_types=1);

namespace PHPOS\OS;

interface ConfigureOptionInterface
{
    public function distributionDirectory(): string;
    public function OSImageFileName(): string;
    public function usingAssemblerType(): AssemblerType;
    public function makeFileName(): string;
    public function codes(): array;
    public function compiledExtensionName(): string;
}
