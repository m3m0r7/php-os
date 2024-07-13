<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

class DataRegister16Bits implements StorableRegister, DataRegisterWithHighAndLowInterface
{
    public function __construct(
        public readonly RegisterInterface $value,
        public readonly RegisterInterface $high,
        public readonly RegisterInterface $low,
    ) {
    }

    public function value(): RegisterInterface
    {
        return $this->value;
    }

    public function high(): RegisterInterface
    {
        return $this->high;
    }

    public function low(): RegisterInterface
    {
        return $this->low;
    }
}
