<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

class DataRegister implements StorableRegister, DataRegisterInterface
{
    public function __construct(
        public readonly RegisterInterface $x,
        public readonly RegisterInterface $high,
        public readonly RegisterInterface $low,
    ) {}

    public function x(): RegisterInterface
    {
        return $this->x;
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
