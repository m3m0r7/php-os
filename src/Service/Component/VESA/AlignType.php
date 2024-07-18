<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\VESA;

use PHPOS\Service\BIOS\VESABIOSExtension\VESA;

enum AlignType
{
    case TOP_LEFT;
    case TOP_CENTER;
    case TOP_RIGHT;
    case BOTTOM_LEFT;
    case BOTTOM_CENTER;
    case BOTTOM_RIGHT;
    case CENTER_LEFT;
    case CENTER_CENTER;
    case CENTER_RIGHT;
}
