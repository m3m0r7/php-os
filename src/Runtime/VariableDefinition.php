<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Support\Hex;

class VariableDefinition implements VariableDefinitionInterface
{
    public function __construct(protected string $name, protected string|Hex|int $value)
    {

    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string|Hex|int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
