<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Support\Hex;

class KeyValue implements KeyValueInterface
{
    public function __construct(protected string $name, protected string|Hex|int|null $value)
    {

    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string|Hex|int|null
    {
        return $this->value;
    }

    public function __toString(): string
    {
        // Return forcibly an empty if value is null
        if ($this->value === null) {
            return '';
        }
        return $this->value;
    }
}
