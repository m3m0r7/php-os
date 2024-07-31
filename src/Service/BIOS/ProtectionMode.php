<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS;

use PHPOS\Architecture\Register\ControlRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\And_;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Or_;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class ProtectionMode implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        [$enable] = $this->parameters + [null];
        assert(is_bool($enable));

        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        $cr0 = $registers->get(RegisterType::CONTROL_REGISTER_0);
        assert($cr0 instanceof ControlRegisterInterface);

        if ($enable) {
            return (new Instruction($this->code, $serviceComponent))
                ->append(Mov::class, $ac->value(), $cr0->value())
                ->append(Or_::class, $ac->value(), 0x1)
                ->append(Mov::class, $cr0->value(), $ac->value());
        }

        return (new Instruction($this->code, $serviceComponent))
            ->append(Mov::class, $ac->value(), $cr0->value())
            ->append(And_::class, $ac->value(), 0xFFFFFFFE)
            ->append(Mov::class, $cr0->value(), $ac->value());
    }
}
