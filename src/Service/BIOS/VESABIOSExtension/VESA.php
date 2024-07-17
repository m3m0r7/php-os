<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Operation\Jmp;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Disk\LoadSector;
use PHPOS\Service\ServiceInterface;

enum VESA: int
{
    // 1024x768x32bpp
    public const VIDEO_1024x768x32bpp = 0x118;
    public const VIDEO_1024x768x32bpp_WIDTH = 1024;
    public const VIDEO_1024x768x32bpp_HEIGHT = 768;

    public const GRAPHIC_MODE = 0x4000;
    public const PHYS_BASE_PTR_ADD = 40;

    public const LINEAR_FRAME_BUFFER_ADDRESS = 28;

    case GET_INFO = 0x4F01;
    case SET_MODE = 0x4F02;
}
