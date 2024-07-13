<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

class IndexRegister64Bits implements StorableRegister, IndexRegisterInterface
{
    public function __construct(
        public readonly RegisterInterface $index,
    ) {
    }

    public function index(): RegisterInterface
    {
        return $this->index;
    }
}
