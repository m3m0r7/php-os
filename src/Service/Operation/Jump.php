<?php

declare(strict_types=1);

namespace PHPOS\Service\Operation;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Operation\Jmp;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;

class Jump implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$code] = $this->parameters + [null];
        assert($code instanceof CodeInterface);

        return (new Instruction($this->code))
            ->append(Jmp::class, new Hex($code->origin(), 16));
    }
}
