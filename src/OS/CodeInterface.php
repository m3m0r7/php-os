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
    public function setSector(int $sector): CodeInterface;
    public function sector(): DefineInterface;
    public function setDrive(int $drive): CodeInterface;
    public function drive(): DefineInterface;
    public function setHead(int $head): CodeInterface;
    public function head(): DefineInterface;
    public function setSectors(int $sectors): CodeInterface;
    public function sectors(): DefineInterface;
    public function setBits(BitType $bitType): self;
    public function bits(): BitType;
    public function setOrigin(OSInfo|int $origin): self;
    public function origin(): int;
}
