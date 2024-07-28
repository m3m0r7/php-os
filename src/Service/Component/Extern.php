<?php

declare(strict_types=1);

namespace PHPOS\Service\Component;

use PHPOS\OS\CodeInterface;
use PHPOS\Runtime\KeyValueInterface;

class Extern
{
    protected array $values = [];

    public function set(KeyValueInterface $value): self
    {
        $this->values[$value->name()] = $value;
        return $this;
    }

    public function get(string $name): KeyValueInterface
    {
        return $this->values[$name];
    }

    public function values(): array
    {
        return $this->values;
    }
}
