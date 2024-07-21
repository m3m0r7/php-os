<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Runtime\KeyValueOption;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\Component\Formatter;
use PHPOS\Service\ServiceInterface;

class SetVESAAddress implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $resb = $this->code->architecture()->runtime()
            ->reserveByte(Formatter::removeSign(static::class), 256);

        return new Instruction($this->code);
    }
}
