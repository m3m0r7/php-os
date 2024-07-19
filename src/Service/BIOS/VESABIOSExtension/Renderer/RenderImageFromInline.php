<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\Image;
use PHPOS\Service\Component\Variable;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;

class RenderImageFromInline implements ServiceInterface
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

        $registers = $this->code->architecture()->runtime()->registers();

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        [, , $bitType] = $vesa->resolutions();
        assert($bitType instanceof VideoBitType);

        $variable = Variable::createWithNameBy(
            $this->code,
            $this->label() . '_image',
            array_chunk($image->as8BitsRGBAList(), ($bitType->value / 8) * 16),
        );

        return (new Instruction($this->code))
            ->append(Mov::class, $si->index(), $variable->name())
            ->include(new RenderImage($this->code, $this, $image->width(), $image->height(), $vesa));
    }
}
