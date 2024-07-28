<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk\LBA;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\Operation\Div;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class ConvertLBAToCHS implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $base = $registers->get(RegisterType::BASE_BITS_16);
        assert($ac instanceof DataRegisterInterface);

        $data = $registers->get(RegisterType::DATA_BITS_16);
        assert($data instanceof DataRegisterWithHighAndLowInterface);

        $counter = $registers->get(RegisterType::COUNTER_BITS_16);
        assert($counter instanceof DataRegisterWithHighAndLowInterface);

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $base, 0x3F)
                    ->append(Div::class, $base)
                    ->append(Add::class, $data->low(), 1)

                    ->append(Mov::class, $base, 0x100)
                    ->append(Div::class, $base)
                    ->append(Add::class, $data->high(), $data->low())
                    ->append(Add::class, $data->low(), $ac->low())


                    ->append(Mov::class, $base, 0x40)
                    ->append(Div::class, $base)
                    ->append(Add::class, $counter->high(), $ac->low())

                    ->append(Ret::class)
            );
    }
}
