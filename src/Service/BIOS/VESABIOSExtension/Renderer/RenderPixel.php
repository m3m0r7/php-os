<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Loop;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Pop;
use PHPOS\Operation\Push;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;

class RenderPixel implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$vesa, $innerInstruction] = $this->parameters + [
            VESA::VIDEO_640x480x32bpp,
            null
        ];

        assert($vesa instanceof VESA);
        assert(is_callable($innerInstruction));

        $registers = $this->code->architecture()->runtime()->registers();

        $counter = $registers->get(RegisterType::COUNTER_BITS_32);
        assert($counter instanceof DataRegisterInterface);

        [$XResolution, $YResolution, $bitType] = $vesa->resolutions();
        assert($bitType instanceof VideoBitType);

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Push::class, $counter->value())
                    ->append(Mov::class, $counter->value(), $bitType->value / 8)
                    ->label(
                        $this->label() . '_code',
                        $innerInstruction,
                    )
                    ->append(Pop::class, $counter->value())
            );
    }
}
