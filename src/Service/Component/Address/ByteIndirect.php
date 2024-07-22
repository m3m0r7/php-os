<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Address;

use PHPOS\OS\CodeInterface;

class ByteIndirect implements \Stringable
{
    public function __construct(protected string $address)
    {
    }

    public function __toString(): string
    {
        return sprintf(
            'byte [%s]',
            $this->address,
        );
    }
}
