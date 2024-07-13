<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation;

interface EntityInterface
{
    public function name(): string;
    public function opcode(): int;
    public function process(DestinationInterface $destination, SourceInterface ...$sources): string;
}
