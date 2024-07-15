<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\IO;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;

class PrintCharacter implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$register] = $this->parameters;

        return (new Instruction($this->code))
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
