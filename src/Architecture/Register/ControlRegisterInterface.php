<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

interface ControlRegisterInterface
{
    public function value(): RegisterInterface;
}
