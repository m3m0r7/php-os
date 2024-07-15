<?php

declare(strict_types=1);

namespace PHPOS\Service\Kit\Startup;

use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Call;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;
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
        $registers = $this->code->architecture()->runtime()->registers();
        $printStringService = new PrintString($this->code, null, 'Hello World!');

        return (new Instruction($this->code))
            ->label(
                OSInfo::ENTRY_POINT,
                fn (InstructionInterface $instruction) => $instruction
                    ->include(new SetupSegments($this->code))
            )
            ->include($printStringService);
    }
}
