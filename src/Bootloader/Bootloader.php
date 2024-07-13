<?php

declare(strict_types=1);

namespace PHPOS\Bootloader;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Assembly\Assembly;
use PHPOS\Assembly\AssemblyInterface;
use PHPOS\Service\EndOfBootLoader;
use PHPOS\Service\HelloWorld;
use PHPOS\Service\PrintString;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\Start;
use PHPOS\Service\Variable;

class Bootloader implements BootloaderInterface
{
    protected array $initializationServices = [];
    protected array $postServices = [];
    public function __construct(public readonly ArchitectureInterface $architecture, protected readonly OptionInterface $option)
    {

    }

    public function architecture(): ArchitectureInterface
    {
        return $this->architecture;
    }

    public function option(): OptionInterface
    {
        return $this->option;
    }

    public function registerInitializationService(string $serviceName): self
    {
        $this->initializationServices[] = $serviceName;
        return $this;
    }

    public function registerPostService(string $serviceName): self
    {
        $this->postServices[] = $serviceName;
        return $this;
    }

    public function assemble(): AssemblyInterface
    {
        return new Assembly(
            $this,
            $this->initializationServices,
            $this->postServices,
        );
    }
}
