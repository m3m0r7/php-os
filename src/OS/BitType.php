<?php

declare(strict_types=1);

namespace PHPOS\OS;

enum BitType: int
{
    case BIT_16 = 16;
    case BIT_32 = 32;
    case BIT_64 = 64;
}
