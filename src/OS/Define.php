<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\Support\Hex;

class Define implements DefineInterface
{
    public function __construct(protected string $name, protected string|int|null $value)
    {

    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string|int|null
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
