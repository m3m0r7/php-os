<?php

declare(strict_types=1);

namespace PHPOS\Service\Kit\Startup\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\Operation\Loop;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Pop;
use PHPOS\Operation\Push;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Address\DoubleWord;
use PHPOS\Service\Component\VESA\RGBA;
use PHPOS\Service\ServiceInterface;

class RenderSquareIntoCenter implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$color, $width, $height] = $this->parameters + [new RGBA(0xFF, 0xFF, 0xFF), 100, 100];
        assert($color instanceof RGBA);

        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $counter = $registers->get(RegisterType::COUNTER_BITS_32);
        assert($counter instanceof DataRegisterInterface);

        $base = $registers->get(RegisterType::BASE_BITS_32);
        assert($base instanceof DataRegisterInterface);

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_32);
        assert($di instanceof IndexRegisterInterface);

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $counter->value(), $height)
            )
            ->label(
                $this->label() . '_outer',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Push::class, $counter->value())
                    ->append(Mov::class, $counter->value(), $width),
            )
            ->label(
                $this->label() . '_inner',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, new DoubleWord($di->index()), $color->as24BitHex())
                    // Byte to Bits
                    ->append(Add::class, $di->index(), 24 / 8)

                    ->append(Loop::class, $this->label() . '_inner')
                    ->append(Pop::class, $counter->value())
                    ->append(Add::class, $di->index(), (24 / 8) * (VESA::VIDEO_1024x768x32bpp_WIDTH - $width)),
            )
            ->append(Loop::class, $this->label() . '_outer');
    }
}
