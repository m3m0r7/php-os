<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\Architecture\Support\Hex;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\Image;
use PHPOS\Service\Component\Variable;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;

class EmbedImage implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$image, $vesa] = $this->parameters + [
            null,
            VESA::VIDEO_640x480x32bpp,
        ];

        assert($vesa instanceof VESA);
        assert($image instanceof Image);
        [, , $bitType] = $vesa->resolutions();
        assert($bitType instanceof VideoBitType);

        Variable::createWithNameBy(
            $this->code,
            $this->label() . '_image',
            array_chunk($image->as8BitsRGBAList(), ($bitType->value / 8) * 16),
        );

        return new Instruction($this->code);
    }
}
