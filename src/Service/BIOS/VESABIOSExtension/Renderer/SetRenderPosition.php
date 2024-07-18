<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\VESA\Align;
use PHPOS\Service\Component\VESA\AlignType;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;

class SetRenderPosition implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$width, $height, $alignType, $vesa] = $this->parameters + [
            null,
            null,
            null,
            VESA::VIDEO_640x480x32bpp,
        ];

        assert(is_int($width));
        assert(is_int($height));
        assert($alignType instanceof AlignType);
        assert($vesa instanceof VESA);

        $registers = $this->code->architecture()->runtime()->registers();

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

        [$XResolution, $YResolution, $bitType] = $vesa->resolutions();
        assert($bitType instanceof VideoBitType);

        $pos = (new Align($alignType))
            ->calculateIndexByImageBitType(
                $bitType,
                $XResolution,
                $YResolution,
                $width,
                $height,
            );

        return (new Instruction($this->code))
            ->append(
                Add::class,
                $di->index(),
                $pos,
            );
    }
}
