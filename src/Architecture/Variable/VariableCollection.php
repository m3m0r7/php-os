<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Variable;

use PHPOS\Architecture\Collection\Collection;

class VariableCollection extends Collection
{
    protected string $className = Variable::class;

    public function set(VariableType $registerType, Variable $variable): self
    {
        $this->items[$registerType->name] = $variable;
        return $this;
    }

    public function get(VariableType $variableType): Variable
    {
        return $this->items[$variableType->name];
    }
}