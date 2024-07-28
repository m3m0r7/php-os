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
use PHPOS\Service\ServiceManagerInterface;

class SetRenderPosition implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        [$width, $height, $alignType, $x, $y] = $this->parameters + [
            null,
            null,
            null,
            0,
            0,
        ];

        assert(is_int($width));
        assert(is_int($height));
        assert($alignType instanceof AlignType);
        assert(is_int($x));
        assert(is_int($y));

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

        $pos = (new Align($alignType))
            ->calculateIndexByImageBitType(
                $bitType,
                $XResolution,
                $YResolution,
                $width,
                $height,
                $x,
                $y,
            );

        return (new Instruction($this->code, $serviceManager))
            ->append(
                Add::class,
                $di->index(),
                $pos,
            );
    }
}
