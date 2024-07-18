<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Inc;
use PHPOS\Operation\Lodsb;
use PHPOS\Operation\Loop;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Address\Indirect;
use PHPOS\Service\Component\Image\Image;
use PHPOS\Service\Component\Variable;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;

class RenderImage implements ServiceInterface
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

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $counter = $registers->get(RegisterType::COUNTER_BITS_32);
        assert($counter instanceof DataRegisterInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($base instanceof DataRegisterInterface);

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        [$XResolution, $YResolution, $bitType] = $vesa->resolutions();
        assert($bitType instanceof VideoBitType);

        $nextLineCursor = ($bitType->value / 8) * ($XResolution - $image->width());

        $variable = Variable::createWithNameBy(
            $this->code,
            $this->label() . '_image',
            array_chunk($image->as8BitsRGBAList(), ($bitType->value / 8) * 16),
        );

        return (new Instruction($this->code))
            ->append(Mov::class, $si->index(), $variable->name())
            ->include(new Renderer(
                $this->code,
                null,
                $image->width(),
                $image->height(),
                $vesa,
                fn (InstructionInterface $instruction) => $instruction
                    ->include(new RenderPixel(
                        $this->code,
                        null,
                        $vesa,
                        fn (InstructionInterface $instruction) => $instruction
                            ->label(
                                $this->label() . '_copy_pixel_from_destination',
                                fn (InstructionInterface $instruction) => $instruction
                                    ->append(Lodsb::class)
                                    ->append(Mov::class, new Indirect($di->index()->realName()), $ac->low())
                                    ->append(Inc::class, $di->index())
                                    ->append(Loop::class, $this->label() . '_copy_pixel_from_destination')
                            )
                    ))
            ));
    }
}