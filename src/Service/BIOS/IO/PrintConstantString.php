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
use PHPOS\Runtime\KeyValueInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString\PrintCharacter;
use PHPOS\Service\BIOS\IO\PrintConstantString\PrintDone;
use PHPOS\Service\Component\Color256Set;
use PHPOS\Service\Component\Variable;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class PrintConstantString implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        /**
         * @var string|KeyValueInterface $stringOrVariable
         * @var Color256Set $textColor
         */
        [$stringOrVariable, $textColor] = $this->parameters + ['', Color256Set::WHITE];

        assert(is_string($stringOrVariable) || $stringOrVariable instanceof KeyValueInterface);

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $printDone = $serviceComponent->createServiceWithParent(PrintDone::class, $this);
        $printCharacter = $serviceComponent->createServiceWithParent(PrintCharacter::class, $this, $textColor);

        if (is_string($stringOrVariable)) {
            $variable = Variable::createBy($this->code, $stringOrVariable);
        } else {
            $variable = $stringOrVariable;
        }

        return (new Instruction($this->code, $serviceComponent))
            ->append(
                Mov::class,
                $si->index(),
                $variable->name(),
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
