<?php

declare(strict_types=1);

namespace PHPOS\OS;

enum CodeInfo: int
{
    // 32KB
    public const CODE_BLOCK_SIZE_BITS_16 = 1024 * 32;

    // 64KB
    public const CODE_BLOCK_SIZE_BITS_32 = 1024 * 32 * 2;
}
