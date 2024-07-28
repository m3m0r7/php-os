<?php

declare(strict_types=1);

namespace PHPOS\Service\Kit\Startup\VESABIOSExtension;

use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderSquare;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\RGBA;
use PHPOS\Service\Component\VESA\Align;
use PHPOS\Service\Component\VESA\AlignType;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class RenderSquareIntoCenter implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        [$color, $width, $height] = $this->parameters + [
            new RGBA(0xFF, 0xFF, 0xFF),
            100,
            100,
        ];

        assert($color instanceof RGBA);

        $registers = $this->code->architecture()->runtime()->registers();

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

        [$XResolution, $YResolution, $bitType] = $this->code
            ->architecture()
            ->runtime()
            ->style()
            ->screen()
            ->resolutions();

        assert($bitType instanceof VideoBitType);

        $centeredPos = (new Align(AlignType::CENTER_CENTER))
            ->calculateIndexByImageBitType(
                $bitType,
                $XResolution,
                $YResolution,
                $width,
                $height,
            );

        $renderSquare = $serviceManager->createService($width, $height, $color);

        return (new Instruction($this->code, $serviceManager))
            ->append(
                Add::class,
                $di->index(),
                $centeredPos,
            )
            ->include($renderSquare);
    }
}
