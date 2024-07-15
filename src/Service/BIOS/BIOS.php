<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS;

enum BIOS: int
{
    case READ = 0x02;

    case VIDEO_INTERRUPT = 0x10;
    case DISK_INTERRUPT = 0x13;
}
