<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Operation\Destination;
use PHPOS\Architecture\Operation\OperationInterface;
use PHPOS\Architecture\Operation\Source;

interface InstructionInterface
{
    public function append(string $operation, mixed $destination = null, mixed ...$sources): InstructionInterface;
    public function assemble(): string;
}
