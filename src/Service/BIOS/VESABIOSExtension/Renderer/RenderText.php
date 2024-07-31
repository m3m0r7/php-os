<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Address\DoubleWord;
use PHPOS\Service\Component\Text\FontInterface;
use PHPOS\Service\Component\Variable;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class RenderText implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        [$font, $vesa] = $this->parameters + [
            null,
            VESA::VIDEO_640x480x32bpp,
        ];

        assert($font instanceof FontInterface);
        assert($vesa instanceof VESA);

        $registers = $this->code->architecture()->runtime()->registers();

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        [, , $bitType] = $vesa->resolutions();
        assert($bitType instanceof VideoBitType);

        $variable = Variable::createWithNameBy(
            $this->code,
            $this->label() . '_image',
            array_chunk($font->as8BitsRGBAList(), ($bitType->value / 8) * 16),
        );

        $renderImage = $serviceComponent->createServiceWithParent(
            RenderImage::class,
            $this,
            $font->width(),
            $font->height(),
            $vesa,
        );

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $si->index(), $variable->name())
                    ->include($renderImage),
            );
    }
}
