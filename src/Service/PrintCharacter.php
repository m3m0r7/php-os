<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;

class PrintCharacter implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$register] = $this->parameters;

        return (new Instruction($this->bootloader))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                $instruction
                    ->append(Mov::class, $register, new Hex(0x0E))
                    ->append(Int_::class, new Hex(0x10))
                    ->append(Ret::class)
            );
    }
}
