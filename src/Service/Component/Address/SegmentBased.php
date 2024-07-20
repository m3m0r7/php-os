<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Address;

use PHPOS\Architecture\Support\Hex;
use PHPOS\OS\CodeInterface;

class SegmentBased implements \Stringable
{
    public function __construct(protected int|string $selector, protected int|string $offset)
    {
    }

    public function __toString(): string
    {
        return sprintf(
            '%s:%s',
            (string) new Hex($this->selector),
            is_int($this->offset)
                ? (string) new Hex($this->offset)
                : $this->offset,
        );
    }
}
