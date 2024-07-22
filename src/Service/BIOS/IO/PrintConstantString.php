<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\IO;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Call;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Jz;
use PHPOS\Operation\Lodsb;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Or_;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString\PrintCharacter;
use PHPOS\Service\BIOS\IO\PrintConstantString\PrintDone;
use PHPOS\Service\Component\Color256Set;
use PHPOS\Service\Component\Variable;
use PHPOS\Service\ServiceInterface;

class PrintConstantString implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        /**
         * @var string $string
         * @var Color256Set $textColor
         */
        [$string, $textColor] = $this->parameters + ['', Color256Set::WHITE];

        assert(is_string($string));

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $printDone = new PrintDone($this->code, $this);
        $printCharacter = new PrintCharacter($this->code, $this, $textColor);

        return (new Instruction($this->code))
            ->append(
                Mov::class,
                $si->index(),
                Variable::createBy($this->code, $string)
                    ->name(),
            )
            ->append(Call::class, $this->label())
            ->append(Jmp::class, $this->label() . '_finish')
            ->include($printCharacter)
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                    $instruction
                        ->append(Lodsb::class)
                        ->append(Or_::class, $ac->low(), $ac->low())
                        ->append(Jz::class, $printDone)
                        ->append(Call::class, $printCharacter)
                        ->append(Jmp::class, $this)
            )
            ->include($printDone)
            ->label($this->label() . '_finish');
    }
}
