<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Service\ServiceInterface;

interface InstructionInterface
{
    public function label(string $name, callable $callback = null): InstructionInterface;
    public function section(string $name, callable $callback): InstructionInterface;
    public function merge(InstructionInterface $instruction): InstructionInterface;
    public function include(ServiceInterface $service): InstructionInterface;
    public function append(string $operation, mixed $destination = null, mixed ...$sources): InstructionInterface;
    public function assemble(): string;
    public function valueOf(): array;
}
