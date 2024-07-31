<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\IO\ReadConstantString;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Call;
use PHPOS\Operation\Cmp;
use PHPOS\Operation\Inc;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Je;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;
use PHPOS\Operation\Xor_;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\Component\Address\ByteIndirect;
use PHPOS\Service\Component\Address\Indirect;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class ReadConstantString implements ServiceInterface
{
    use BaseService {
        __construct as __baseConstruct;
    }

    public function __construct(protected CodeInterface $code, protected ?ServiceInterface $parent = null, ...$parameters)
    {
        $this->__baseConstruct($code, $parent, $parameters);

        $this
            ->extern
            ->set(
                $this->code
                    ->architecture()
                    ->runtime()
                    ->setNullFilledVariable(
                        $this->label() . '_buffer',
                        256,
                    )
            );
    }

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();
        $ax = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ax instanceof DataRegisterWithHighAndLowInterface);

        $di = $registers->get(RegisterType::DESTINATION_INDEX_BITS_16);
        assert($di instanceof IndexRegisterInterface);

        $buffer = $this->extern->get($this->label() . '_buffer');

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $di->index(), $buffer->name())
                    ->append(Call::class, $this->label() . '_char_read')
                    ->append(Jmp::class, $this->label() . '_done')
                    ->label(
                        $this->label() . '_char_read',
                        fn (InstructionInterface $instruction) => $instruction
                            ->append(Xor_::class, $ax->high(), $ax->high())
                            ->append(Int_::class, BIOS::KEYBOARD_INTERRUPT->value)

                            ->append(Mov::class, new Indirect($di->index()->realName()), $ax->low())
                            ->append(Mov::class, $ax->high(), 0x0E)
                            ->append(Int_::class, BIOS::VIDEO_INTERRUPT->value)


                            ->append(Cmp::class, $ax->low(), 0x0D)
                            ->append(Je::class, $this->label() . '_done_read')
                            ->append(Inc::class, $di->index())
                            ->append(Jmp::class, $this->label() . '_char_read')

                            ->label(
                                $this->label() . '_done_read',
                                fn (InstructionInterface $instruction) => $instruction
                                    ->append(Mov::class, new ByteIndirect($di->index()->realName()), 0)
                                    ->append(Ret::class),
                            )
                    ),
            )
            ->label($this->label() . '_done');
    }
}