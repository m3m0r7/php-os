<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Assembly\Assembly;
use PHPOS\Assembly\AssemblyInterface;

class Code implements CodeInterface
{
    protected array $services = [];
    protected array $postServices = [];
    protected int $sector = OSInfo::DEFAULT_BOOT_SECTOR;

    public function __construct(public readonly ArchitectureInterface $architecture, protected readonly OptionInterface $option)
    {

    }

    public function setSector(int $sector): CodeInterface
    {
        $this->sector = $sector;
        return $this;
    }

    public function architecture(): ArchitectureInterface
    {
        return $this->architecture;
    }

    public function option(): OptionInterface
    {
        return $this->option;
    }

    public function registerService(string $serviceName, mixed ...$parameters): self
    {
        $this->services[] = [$serviceName, $parameters];
        return $this;
    }

    public function registerPostService(string $serviceName, mixed ...$parameters): self
    {
        $this->postServices[] = [$serviceName, $parameters];
        return $this;
    }

    public function assemble(): AssemblyInterface
    {
        return new Assembly(
            $this,
            $this->services,
            $this->postServices,
        );
    }
}
