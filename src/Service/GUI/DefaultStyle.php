<?php

declare(strict_types=1);

namespace PHPOS\Service\GUI;

use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\RGBA;

class DefaultStyle implements StyleInterface
{
    public function menubarHeight(): int
    {
        return 20;
    }

    public function menubarBackground(): RGBA
    {
        return RGBA::fromColorCode(
            0xC5C6D0,
        );
    }

    public function menubarFontColor(): RGBA
    {
        return RGBA::fromColorCode(
            0x000000,
        );
    }

    public function menubarBorderSize(): int
    {
        return 1;
    }

    public function menubarBorderColor(): RGBA
    {
        return RGBA::fromColorCode(
            0x000000,
        );
    }

    public function menubarFontSize(): int
    {
        return 12;
    }

    public function menubarFontPath(): string
    {
        return 'Arial';
    }

    public function backgroundColor(): RGBA
    {
        return RGBA::fromColorCode(
            0x331F54,
        );
    }

    public function screen(): VESA
    {
        return VESA::VIDEO_640x480x32bpp;
    }
}
