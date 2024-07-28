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
use PHPOS\Service\ServiceManagerInterface;

class FillScreen implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        [$width, $height] = $this->code
            ->architecture()
            ->runtime()
            ->style()
            ->screen()
            ->resolutions();

        $renderSquare = new RenderSquare(
            $this->code,
            $this,
            $width,
            $height,
            $this->code
                ->architecture()
                ->runtime()
                ->style()
                ->backgroundColor(),
        );
        $loadVESAVideoAddress = new LoadVESAVideoAddress($this->code, $this);

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->include($loadVESAVideoAddress)
                    ->include($renderSquare)
            );
    }
}
