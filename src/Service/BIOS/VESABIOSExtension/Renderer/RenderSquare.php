<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Address\DoubleWord;
use PHPOS\Service\Component\Image\RGBA;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;

class RenderSquare implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$width, $height, $color, $vesa] = $this->parameters + [
            null,
            null,
            new RGBA(0xff, 0xff, 0xff),
            VESA::VIDEO_640x480x32bpp,
        ];

        assert($vesa instanceof VESA);
        assert($color instanceof RGBA);

        $registers = $this->code->architecture()->runtime()->registers();

        $counter = $registers->get(RegisterType::COUNTER_BITS_32);
        assert($counter instanceof DataRegisterInterface);

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

        [$XResolution, $YResolution, $bitType] = $vesa->resolutions();
        assert($bitType instanceof VideoBitType);

        $nextLineCursor = ($bitType->value / 8) * ($XResolution - $width);

        return (new Instruction($this->code))
            ->include(new Renderer(
                $this->code,
                null,
                $width,
                $height,
                $vesa,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, new DoubleWord($di->index()), $color->asHexByVideoType($bitType))
                    ->append(Add::class, $di->index(), $bitType->value / 8),
                )
            );
    }
}
