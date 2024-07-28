<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\IO;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Register\StackPointerRegisterInterface;
use PHPOS\Architecture\Support\Text;
use PHPOS\Operation\Add;
use PHPOS\Operation\Call;
use PHPOS\Operation\Cmp;
use PHPOS\Operation\Div;
use PHPOS\Operation\Inc;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Jne;
use PHPOS\Operation\Loop;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Pop;
use PHPOS\Operation\Push;
use PHPOS\Operation\Ret;
use PHPOS\Operation\Xor_;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString\PrintCharacter;
use PHPOS\Service\BIOS\IO\PrintConstantString\PrintDone;
use PHPOS\Service\Component\Color256Set;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class PrintNumberFromAX implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        /**
         * @var Color256Set $textColor
         */
        [$textColor] = $this->parameters + [Color256Set::WHITE];

        $bp = $registers->get(RegisterType::BASE_POINTER_BITS_32);
        assert($bp instanceof StackPointerRegisterInterface);

        $sp = $registers->get(RegisterType::STACK_POINTER_BITS_32);
        assert($sp instanceof StackPointerRegisterInterface);

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $counter = $registers->get(RegisterType::COUNTER_BITS_32);
        assert($counter instanceof DataRegisterInterface);

        $data = $registers->get(RegisterType::DATA_BITS_16);
        assert($data instanceof DataRegisterWithHighAndLowInterface);

        $base = $registers->get(RegisterType::BASE_BITS_16);
        assert($base instanceof DataRegisterWithHighAndLowInterface);

        $printDone = new PrintDone($this->code, $this);
        $printCharacter = new PrintCharacter($this->code, $this, $textColor);

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $bp->pointer(), $sp->pointer())
                    ->append(Cmp::class, $ac->value(), 0)
                    ->append(Jne::class, $this->label() . '_convert')
                    ->append(Mov::class, $ac->low(), new Text('0'))
                    ->append(Call::class, $printCharacter)
                    ->append(Jmp::class, $this->label() . '_done')
            )
            ->label(
                $this->label() . '_convert',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $counter->value(), 0)

                    ->label(
                        $this->label() . '_convert_loop',
                        fn (InstructionInterface $instruction) => $instruction
                            ->append(Xor_::class, $data->value(), $data->value())
                            ->append(Mov::class, $base->value(), 10)
                            ->append(Div::class, $base->value())
                            ->append(Push::class, $data->value())
                            ->append(Inc::class, $counter->value())
                            ->append(Cmp::class, $ac->value(), 0)
                            ->append(Jne::class, $this->label() . '_convert_loop'),
                    )
                    ->label(
                        $this->label() . '_convert_print',
                        fn (InstructionInterface $instruction) => $instruction
                            ->append(Pop::class, $data->value())
                            ->append(Add::class, $data->low(), new Text('0'))
                            ->append(Mov::class, $ac->low(), $data->low())
                            ->append(Call::class, $printCharacter->label())
                            ->append(Loop::class, $this->label() . '_convert_print')
                    )
            )
            ->label(
                $this->label() . '_done',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $sp->pointer(), $bp->pointer())
                    ->append(Ret::class)
            )
            ->include($printCharacter);
    }
}
