<?php

declare(strict_types=1);

namespace PHPOS\OS;

enum OSInfo: int
{
    public const BOOTLOADER_SIZE = 512;
    public const PAGE_SIZE = 512;
    public const ENTRY_POINT = 'main';

    case MBR = 0x7C00;
    case KERNEL = 0x1000;
}
