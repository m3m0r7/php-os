<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

class DataRegister32Bits implements StorableRegister, DataRegisterInterface
{
    public function __construct(
        public readonly RegisterInterface $value,
    ) {}

    public function value(): RegisterInterface
    {
        return $this->value;
    }
}
