<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Support\Hex;

class KeyValue implements KeyValueInterface
{
    public function __construct(protected string $name, protected string|Hex|int|array|null $value, protected KeyValueOptionInterface $keyValueOption = new KeyValueOption())
    {
        if (is_array($this->value)) {
            // TODO: validating value is a matrix array
        }
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string|Hex|int|array|null
    {
        return $this->value;
    }

    public function __toString(): string
    {
        // Return forcibly an empty if value is null
        if ($this->value === null) {
            return '';
        }
        if (is_array($this->value)) {
            return print_r($this->value, true);
        }
        return $this->value;
    }

    public function option(): KeyValueOptionInterface
    {
        return $this->keyValueOption;
    }
}
