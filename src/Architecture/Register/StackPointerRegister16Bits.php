<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

class StackPointerRegister16Bits implements StorableRegister, StackPointerRegisterInterface
{
    public function __construct(
        public readonly RegisterInterface $pointer,
    ) {
    }

    public function pointer(): RegisterInterface
    {
        return $this->pointer;
    }
}
