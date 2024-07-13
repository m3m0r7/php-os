<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

class IndexRegister16Bits implements StorableRegister, IndexRegisterWithLowInterface
{
    public function __construct(
        public readonly RegisterInterface $index,
        public readonly RegisterInterface $low,
    ) {}

    public function index(): RegisterInterface
    {
        return $this->index;
    }

    public function low(): RegisterInterface
    {
        return $this->low;
    }
}