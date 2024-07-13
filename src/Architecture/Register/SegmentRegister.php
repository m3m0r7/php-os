<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

class SegmentRegister implements StorableRegister, SegmentRegisterInterface
{
    public function __construct(
        public readonly RegisterInterface $segment,
    ) {
    }

    public function segment(): RegisterInterface
    {
        return $this->segment;
    }
}
