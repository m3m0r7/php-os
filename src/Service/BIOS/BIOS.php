<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS;

enum BIOS: int
{
    public const GDT_ENABLED_CODE_SEGMENT = 0x08;
    public const GDT_ENABLED_DATA_SEGMENT = 0x10;
    public const REAL_MODE_CODE_SEGMENT = 0x00;

    case READ = 0x02;

    case VIDEO_INTERRUPT = 0x10;
    case DISK_INTERRUPT = 0x13;
    case KEYBOARD_INTERRUPT = 0x16;
}
