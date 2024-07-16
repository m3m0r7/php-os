<?php

declare(strict_types=1);

namespace PHPOS\OS;

enum OSInfo: int
{
    public const BOOTLOADER_SIZE = 512;
    public const PAGE_SIZE = 512;
    public const ENTRY_POINT = 'main';
    public const DEFAULT_SECTOR_START = 2;

    public const DEFAULT_BOOT_SECTOR = self::BOOT_SECTOR;

    public const DEFAULT_DRIVE = self::HARD_DISK;

    case MBR = 0x7C00;

    case BOOT_SECTOR = 0x01;
    case HARD_DISK = 0x80;
}
