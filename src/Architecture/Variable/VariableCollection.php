<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Variable;

use PHPOS\Collection\Collection;

class VariableCollection extends Collection
{
    protected string $className = VariableInterface::class;

    public function set(VariableType $registerType, VariableInterface $variable): self
    {
        $this->items[$registerType->name] = $variable;
        return $this;
    }

    public function get(VariableType $variableType): VariableInterface
    {
        return $this->items[$variableType->name];
    }
}