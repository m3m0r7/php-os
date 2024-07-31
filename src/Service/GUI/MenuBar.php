<?php

declare(strict_types=1);

namespace PHPOS\Service\GUI;

use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\LoadVESAVideoAddress;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderSquare;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderText;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\SetRenderPosition;
use PHPOS\Service\Component\Text\Font;
use PHPOS\Service\Component\VESA\AlignType;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class MenuBar implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $style = $this->code
            ->architecture()
            ->runtime()
            ->style();

        [$width] = $style->screen()->resolutions();

        $renderSquare = $serviceComponent->createServiceWithParent(
            RenderSquare::class,
            $this,
            $width,
            $style->menubarHeight(),
            $style->menubarBackground(),
        );

        $renderBorder = $serviceComponent->createServiceWithParent(
            RenderSquare::class,
            $this,
            $width,
            $style->menubarBorderSize(),
            $style->menubarBorderColor(),
        );

        $loadVESAVideoAddress = $serviceComponent->createServiceWithParent(
            LoadVESAVideoAddress::class,
            $this,
        );

        $loadVESAVideoAddressForStartText = $serviceComponent->createServiceWithParent(
            LoadVESAVideoAddress::class,
            $this,
        );

        $renderText = $serviceComponent->createServiceWithParent(
            RenderText::class,
            $this,
            $font = new Font(
                'PHP-OS',
                $style->menubarFontPath(),
                $style->menubarFontSize(),
                $style->menubarFontColor(),
                $style->menubarBackground(),
            ),
        );

        $calculatedTextPosition = (($style->menubarHeight() - $font->height()) / 2);

        $setRenderPosition = $serviceComponent->createServiceWithParent(
            SetRenderPosition::class,
            $this,
            $font->width(),
            $font->height(),
            AlignType::TOP_LEFT,
            $calculatedTextPosition + 4,
            $calculatedTextPosition,
        );

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->include($loadVESAVideoAddress)
                    ->include($renderSquare)
                    ->include($renderBorder)
                    ->label(
                        $this->label() . '_start_text',
                        fn (InstructionInterface $instruction) =>
                            $instruction
                                ->include($loadVESAVideoAddressForStartText)
                                ->include($setRenderPosition)
                                ->include($renderText),
                    )
            );
    }
}
