<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Assembly\Assembly;
use PHPOS\Assembly\AssemblyInterface;
use PHPOS\Service\BIOS\Standard\DefineBitSize;

class Code implements CodeInterface
{
    protected array $services = [];
    protected array $postServices = [];
    protected int|null $sector;
    protected int|null $drive;
    protected int|null $head = 0x00;
    protected int|null $sectors = null;

    protected BitType $bitType = BitType::BIT_16;
    protected OSInfo|int $origin = 0;

    public function __construct(public readonly ArchitectureInterface $architecture, protected readonly OptionInterface $option = new Option())
    {
        $this->sector = OSInfo::DEFAULT_BOOT_SECTOR
            ->value;

        $this->drive = OSInfo::DEFAULT_DRIVE
            ->value;
    }

    public function setSector(int $sector): CodeInterface
    {
        $this->sector = $sector;
        return $this;
    }

    public function sector(): DefineInterface
    {
        return new Define(
            $this->createName(__FUNCTION__),
            $this->sector,
        );
    }

    public function setHead(int $head): CodeInterface
    {
        $this->head = $head;
        return $this;
    }

    public function head(): DefineInterface
    {
        return new Define(
            $this->createName(__FUNCTION__),
            $this->head,
        );
    }

    public function setDrive(int $drive): CodeInterface
    {
        $this->drive = $drive;
        return $this;
    }

    public function drive(): DefineInterface
    {
        return new Define(
            $this->createName(__FUNCTION__),
            $this->drive,
        );
    }

    public function sectors(): DefineInterface
    {
        return new Define(
            $this->createName(__FUNCTION__),
            $this->sectors,
        );
    }

    public function setSectors(int $sectors): CodeInterface
    {
        $this->sectors = $sectors;
        return $this;
    }

    public function setBits(BitType $bitType): self
    {
        $this->bitType = $bitType;
        return $this;
    }

    public function bits(): BitType
    {
        return $this->bitType;
    }

    public function setOrigin(OSInfo|int $origin): self
    {
        $this->origin = $origin;
        return $this;
    }

    public function origin(): int
    {
        if ($this->origin instanceof OSInfo) {
            return $this->origin->value;
        }
        return $this->origin;
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

    private function createName(string $name): string
    {
        return $this->option->prefix() . 'define_' . $this->sector . '_' . $name;
    }
}
