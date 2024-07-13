<?php
declare(strict_types=1);
namespace PHPOS\Runtime;

class VariableDefinition implements VariableDefinitionInterface
{
    public function __construct(protected string $name, protected string $value)
    {

    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}