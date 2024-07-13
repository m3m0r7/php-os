<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Operation\Jmp;

class Start implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        return (new Instruction($this->bootloader))
            ->label(
                'start',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Jmp::class, 'main'),
            );
    }
}
