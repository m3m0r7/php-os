<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

interface StackPointerRegisterInterface
{
    public function pointer(): RegisterInterface;
}
