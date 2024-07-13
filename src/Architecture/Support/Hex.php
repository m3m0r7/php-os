<?php
declare(strict_types=1);

namespace PHPOS\Architecture\Support;

use PHPOS\Exception\HexCannotConvertException;

class Hex implements \Stringable
{
    public function __construct(private int $value, protected int $bits = 8)
    {
    }

    public function __toString(): string
    {
        $zeroFillSize = ((int) $this->bits / 8) * 2;

        if ($zeroFillSize === 0 || ($zeroFillSize & 1) !== 0) {
            throw new HexCannotConvertException('The bits is invalid');
        }

        return sprintf('0x%0' . $zeroFillSize . 'X', $this->value);
    }
}