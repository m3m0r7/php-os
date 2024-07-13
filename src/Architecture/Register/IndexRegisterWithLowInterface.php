<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

interface IndexRegisterWithLowInterface extends IndexRegisterInterface
{
    public function low(): RegisterInterface;
}
