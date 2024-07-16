<?php

declare(strict_types=1);

namespace PHPOS\Service\Kit\Startup;

use PHPOS\Operation\Hlt;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\OS\OSInfo;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintString;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Service\ServiceInterface;

class HelloWorld implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$text] = $this->parameters + ['Hello World!'];

        $printStringService = new PrintString($this->code, null, $text);

        return (new Instruction($this->code))
            ->label(
                OSInfo::ENTRY_POINT,
                fn (InstructionInterface $instruction) => $instruction
                    ->include(new SetupSegments($this->code))
            )
            ->include($printStringService)
            ->append(Hlt::class);
    }
}
