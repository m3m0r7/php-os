<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\System;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Operation\Jmp;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Runtime\KeyValueInterface;
use PHPOS\Runtime\KeyValueOption;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Disk\LoadSector;
use PHPOS\Service\ServiceInterface;

class CallCode implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$code] = $this->parameters + [null];
        assert($code instanceof CodeInterface);

        $loadSector = new LoadSector(
            $this->code,
            $this,
            $code,
        );

        // Including extern definitions
        foreach ($this->code->architecture()->runtime()->reserveBytes() as $value) {
            assert($value instanceof KeyValueInterface);
            if (!$value->option()->isGlobal()) {
                continue;
            }
            $code->architecture()->runtime()->reserveBytes(
                $value->name(),
                $value->value(),
                new KeyValueOption(
                    isExtern: true,
                ),
            );
        }

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                    $instruction
                        ->include($loadSector)
                        ->append(Jmp::class, new Hex($code->origin(), 16))
            );
    }
}
