<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\OS\Bundler\ReplaceMarker;

class Define implements DefineInterface
{
    public function __construct(protected string $name, protected string|int|ReplaceMarker|null $value)
    {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): string|int|null
    {
        if ($this->value instanceof ReplaceMarker) {
            return $this->value->markerName();
        }
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    public function valueOf(): string|ReplaceMarker|int|null
    {
        return $this->value;
    }
}
