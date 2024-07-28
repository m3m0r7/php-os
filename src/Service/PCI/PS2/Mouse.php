<?php

declare(strict_types=1);

namespace PHPOS\Service\PCI\PS2;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\Operation\Call;
use PHPOS\Operation\In;
use PHPOS\Operation\Jnz;
use PHPOS\Operation\Jz;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Movsx;
use PHPOS\Operation\Or_;
use PHPOS\Operation\Out;
use PHPOS\Operation\Ret;
use PHPOS\Operation\Sub;
use PHPOS\Operation\Test;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Runtime\KeyValueInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\Component\Address\ByteIndirect;
use PHPOS\Service\Component\Address\Indirect;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class Mouse implements ServiceInterface
{
    use BaseService {
        __construct as __baseConstruct;
    }

    public function __construct(protected CodeInterface $code, protected ?ServiceInterface $parent = null, ...$parameters)
    {
        $this->__baseConstruct($code, $parent, $parameters);

        $this->extern
            ->set(
                $this->code
                    ->architecture()
                    ->runtime()
                    ->reserveByte(
                        $this->label() . '_mouse_data',
                        3,
                    )
            )
            ->set(
                $this->code
                    ->architecture()
                    ->runtime()
                    ->reserveByte(
                        $this->label() . '_mouse_x',
                        2,
                    )
            )
            ->set(
                $this->code
                    ->architecture()
                    ->runtime()
                    ->reserveByte(
                        $this->label() . '_mouse_y',
                        2,
                    )
            );
    }

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $waitLabel = $this->label() . '_wait';
        $waitInputLabel = $this->label() . '_wait_input';

        $mouseData = $this->extern->get($this->label() . '_mouse_data');
        $mouseX = $this->extern->get($this->label() . '_mouse_x');
        $mouseY = $this->extern->get($this->label() . '_mouse_y');

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    // Read mouse data
                    ->append(Call::class, $waitInputLabel)
                    ->append(In::class, $ac->low(), 0x60)
                    ->append(Mov::class, new Indirect($mouseData->name()), $ac->low())

                    ->append(Call::class, $waitInputLabel)
                    ->append(In::class, $ac->low(), 0x60)
                    ->append(Mov::class, new Indirect($mouseData->name() . ' + 1'), $ac->low())

                    ->append(Call::class, $waitInputLabel)
                    ->append(In::class, $ac->low(), 0x60)
                    ->append(Mov::class, new Indirect($mouseData->name() . ' + 2'), $ac->low())

                    // Read mouse position
                    ->append(Movsx::class, $ac->value(), (string) new ByteIndirect(
                        $mouseData->name() . ' + 1',
                    ))
                    ->append(Add::class, (string) new Indirect($mouseX->name()), $ac->value())

                    ->append(Movsx::class, $ac->value(), (string) new ByteIndirect(
                        $mouseData->name() . ' + 2',
                    ))
                    ->append(Sub::class, (string) new Indirect($mouseY->name()), $ac->value())

                    ->append(Ret::class)
            )
            ->label(
                $this->label() . '_init',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(In::class, $ac->low(), 0x64)
                    ->append(Or_::class, $ac->low(), 0xAB)
                    ->append(Out::class, 0x64, $ac->low())

                    ->append(Call::class, $waitLabel)
                    ->append(Mov::class, $ac->low(), 0x20)
                    ->append(Out::class, 0x64, $ac->low())

                    ->append(Call::class, $waitLabel)
                    ->append(In::class, $ac->low(), 0x60)


                    ->append(Or_::class, $ac->low(), 0x02)
                    ->append(Call::class, $waitLabel)
                    ->append(Out::class, 0x60, $ac->low())

                    ->append(Call::class, $waitLabel)
                    ->append(Mov::class, $ac->low(), 0xD4)
                    ->append(Out::class, 0x64, $ac->low())

                    ->append(Call::class, $waitLabel)
                    ->append(Mov::class, $ac->low(), 0xF4)
                    ->append(Out::class, 0x60, $ac->low())

                    ->append(Ret::class),
            )

            ->label(
                $waitInputLabel,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(In::class, $ac->low(), 0x64)
                    ->append(Test::class, $ac->low(), 0x01)
                    ->append(Jz::class, $waitInputLabel)
                    ->append(Ret::class)
            )
            ->label(
                $waitLabel,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(In::class, $ac->low(), 0x64)
                    ->append(Test::class, $ac->low(), 0x02)
                    ->append(Jnz::class, $waitLabel)
                    ->append(Ret::class)
            );
    }
}
