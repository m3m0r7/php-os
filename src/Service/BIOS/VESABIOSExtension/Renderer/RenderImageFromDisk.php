<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Mov;
use PHPOS\OS\ImageCodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Disk\LoadSector;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class RenderImageFromDisk implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        [$image] = $this->parameters + [null];
        assert($image instanceof ImageCodeInterface);

        $registers = $this->code->architecture()->runtime()->registers();

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        $loadSector = $serviceManager->createServiceWithParent(
            LoadSector::class,
            $this,
            $image,
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
                    ->include($loadSector)
                    ->append(Mov::class, $si->index(), $image->origin())
                    ->include($renderImage),
            );
    }
}
