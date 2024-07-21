<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
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
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;

class Renderer implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$width, $height, $innerInstruction] = $this->parameters + [
            null,
            null,
            null,
        ];

        assert(is_int($width));
        assert(is_int($height));
        assert(is_callable($innerInstruction));

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

        [$XResolution, $YResolution, $bitType] = $this->code
            ->architecture()
            ->runtime()
            ->style()
            ->screen()
            ->resolutions();
        assert($bitType instanceof VideoBitType);

        $nextLineCursor = ($bitType->value / 8) * ($XResolution - $width);

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
                    ->label(
                        $this->label() . '_inner_code',
                        $innerInstruction
                    )

                    ->append(Loop::class, $this->label() . '_inner')
                    ->append(Pop::class, $counter->value())
                    ->append(
                        Add::class,
                        $di->index(),
                        $nextLineCursor,
                    ),
            )
            ->append(Loop::class, $this->label() . '_outer');
        ;
    }
}
