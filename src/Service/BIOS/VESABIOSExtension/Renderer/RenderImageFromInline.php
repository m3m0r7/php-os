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
use PHPOS\Service\ServiceManagerInterface;

class RenderImageFromInline implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        [$image] = $this->parameters + [
            null,
        ];

        assert($image instanceof Image);

        $registers = $this->code->architecture()->runtime()->registers();

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        [, , $bitType] = $this->code->architecture()->runtime()->style()->screen()->resolutions();
        assert($bitType instanceof VideoBitType);

        $variable = Variable::createWithNameBy(
            $this->code,
            $this->label() . '_image',
            array_chunk($image->as8BitsRGBAList(), ($bitType->value / 8) * 16),
        );

        $renderImage = $serviceManager->createServiceWithParent(
            RenderImage::class,
            $this,
            $image->width(),
            $image->height(),
        );

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $si->index(), $variable->name())
                    ->include($renderImage),
            );
    }
}
