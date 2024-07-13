<?php

declare(strict_types=1);

namespace PHPOS\Bootloader;

enum BootloaderInfo: int
{
    case MBR = 0x07c0;
}
