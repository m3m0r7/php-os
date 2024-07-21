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
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\RGBA;
use PHPOS\Service\Component\Text\Font;
use PHPOS\Service\Component\VESA\AlignType;
use PHPOS\Service\ServiceInterface;

class MenuBar implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $style = $this->code
            ->architecture()
            ->runtime()
            ->style();

        [$width] = $style->screen()->resolutions();

        $renderSquare = new RenderSquare(
            $this->code,
            $this,
            $width,
            $style->menubarHeight(),
            $style->menubarBackground(),
        );

        $renderBorder = (new RenderSquare(
            $this->code,
            $this,
            $width,
            $style->menubarBorderSize(),
            $style->menubarBorderColor(),
        ))->setLabelSuffix('border');

        $loadVESAVideoAddress = new LoadVESAVideoAddress($this->code, $this);

        $loadVESAVideoAddressForStartText = (new LoadVESAVideoAddress($this->code, $this))
            ->setLabelSuffix('start_text');

        $renderText = new RenderText(
            $this->code,
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

        $setRenderPosition = new SetRenderPosition(
            $this->code,
            $this,
            $font->width(),
            $font->height(),
            AlignType::TOP_LEFT,
            $calculatedTextPosition + 4,
            $calculatedTextPosition,
        );

        return (new Instruction($this->code))
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
