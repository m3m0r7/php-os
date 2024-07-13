<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Support;

use PHPOS\Runtime\VariableDefinitionInterface;

class Text implements \Stringable
{
    public function __construct(private string $variable)
    {
    }

    public function __toString(): string
    {
        return '"' . str_replace('"', '\\"', $this->variable) . '"';
    }
}
