<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Cli;
use PHPOS\Operation\In;
use PHPOS\Operation\Or_;
use PHPOS\Operation\Out;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;

class EnableA20Line implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        return (new Instruction($this->code))
            ->append(Cli::class)
            ->append(In::class, $ac->low(), 0x92)
            ->append(Or_::class, $ac->low(), 2)
            ->append(Out::class, 0x92, $ac->low());
    }
}
