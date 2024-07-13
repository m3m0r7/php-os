<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Bootloader\BootloaderInfo;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Operation\Mov;

class StartOfBootLoader implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->bootloader->architecture()->runtime()->registers();
        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        return (new Instruction($this->bootloader))
            ->append(Mov::class, $ac->value(), new Hex(BootloaderInfo::MBR->value, 16));
    }
}
