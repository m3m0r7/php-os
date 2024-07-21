<?php

declare(strict_types=1);

namespace PHPOS\Service\GUI;

use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\RGBA;

interface StyleInterface
{
    public function menubarHeight(): int;
    public function menubarBackground(): RGBA;
    public function menubarFontColor(): RGBA;
    public function menubarBorderSize(): int;
    public function menubarBorderColor(): RGBA;
    public function menubarFontSize(): int;
    public function menubarFontPath(): string;
    public function backgroundColor(): RGBA;
    public function screen(): VESA;
}
