<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Address;

use PHPOS\Architecture\Register\RegisterInterface;

class DoubleWord implements \Stringable
{
    public function __construct(protected RegisterInterface|string $address)
    {
    }

    public function __toString(): string
    {
        return sprintf(
            'dword [%s]',
            $this->address instanceof RegisterInterface
                ? $this->address->realName()
                : $this->address,
        );
    }
}
