<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Standard;

use PHPOS\Operation\Ret;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;

class Return_ implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Ret::class)
            );
    }
}
