<?php

declare(strict_types=1);

namespace PHPOS\OS;

class ConfigureOption implements ConfigureOptionInterface
{
    public function __construct(
        protected string $distributionDirectory,
        protected string $osImageFileName,
        protected CodeInterface $bootloader,
        protected array $codes = [],
        protected string $makeFileName = 'Makefile',
        protected string $compiledExtensionName = 'bin',
        protected AssemblerType $usingAssemblerType = AssemblerType::NASM,
    ) {

    }

    public function distributionDirectory(): string
    {
        return $this->distributionDirectory;
    }

    public function OSImageFileName(): string
    {
        return $this->osImageFileName;
    }

    public function usingAssemblerType(): AssemblerType
    {
        return $this->usingAssemblerType;
    }

    public function makeFileName(): string
    {
        return $this->makeFileName;
    }

    public function bootloader(): CodeInterface
    {
        return $this->bootloader;
    }

    public function codes(): array
    {
        return $this->codes;
    }

    public function compiledExtensionName(): string
    {
        return $this->compiledExtensionName;
    }
}
