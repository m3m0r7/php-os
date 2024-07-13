<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

interface DataRegisterWithHighAndLowInterface extends DataRegisterInterface
{
    public function high(): RegisterInterface;
    public function low(): RegisterInterface;
}
