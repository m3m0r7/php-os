<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderImage;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class SetVESABIOSExtension implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        [$resolution] = $this->parameters + [VESA::VIDEO_640x480x32bpp];

        assert($resolution instanceof VESA);

        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($base instanceof DataRegisterInterface);

        $error = $serviceManager->createServiceWithParent(
            SetVESABIOSExtensionError::class,
            $this,
        );

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ac->value(), VESA::SET_MODE->value)
                    ->append(Mov::class, $base->value(), $resolution->value | VESA::GRAPHIC_MODE)
                    ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)
                    ->include($error)
            );
    }
}
