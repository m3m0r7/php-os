<?php
declare(strict_types=1);
namespace PHPOS\Bootloader;

interface InstructionInterface
{
    public function append(string $operation, mixed $destination = null, mixed ...$sources): InstructionInterface;
    public function assemble(): string;
}
