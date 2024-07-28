<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk\LBA;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Cmp;
use PHPOS\Operation\Inc;
use PHPOS\Operation\Jb;
use PHPOS\Operation\Ret;
use PHPOS\Operation\Xor_;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class UpdateCHSAddress implements ServiceInterface
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

        $updateCHSLabelFinished = $this->label() . '_finished';

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Inc::class, $data->low())
                    ->append(Cmp::class, $data->low(), 64)
                    ->append(Jb::class, $updateCHSLabelFinished)

                    ->append(Xor_::class, $data->low(), $data->low())
                    ->append(Inc::class, $data->high())
                    ->append(Cmp::class, $data->high(), 256)
                    ->append(Jb::class, $updateCHSLabelFinished)

                    ->append(Xor_::class, $data->high(), $data->high())
                    ->append(Inc::class, $counter->high())
            )
            ->label(
                $updateCHSLabelFinished,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Ret::class)
            );
    }
}
