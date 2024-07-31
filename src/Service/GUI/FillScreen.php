<?php

declare(strict_types=1);

namespace PHPOS\Service\GUI;

use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\LoadVESAVideoAddress;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderSquare;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\RGBA;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class FillScreen implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        [$width, $height] = $this->code
            ->architecture()
            ->runtime()
            ->style()
            ->screen()
            ->resolutions();


        $renderSquare = $serviceComponent->createServiceWithParent(
            RenderSquare::class,
            $this,
            $width,
            $height,
            $this->code
                ->architecture()
                ->runtime()
                ->style()
                ->backgroundColor(),
        );

        $loadVESAVideoAddress = $serviceComponent->createServiceWithParent(
            LoadVESAVideoAddress::class,
            $this,
        );

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->include($loadVESAVideoAddress)
                    ->include($renderSquare)
            );
    }
}
