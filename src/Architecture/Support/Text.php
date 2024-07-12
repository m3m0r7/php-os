<?php
declare(strict_types=1);

namespace PHPOS\Architecture\Support;

use PHPOS\Exception\HexCannotConvertException;

class Text implements \Stringable
{
    public function __construct(private string $value)
    {
    }

    public function __toString(): string
    {
        return '"' . str_replace('"', '\\"', $this->value) . '"';
    }
}