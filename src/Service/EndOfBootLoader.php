<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;

class EndOfBootLoader implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        return (new Instruction($this->bootloader))
            ->include(new Times($this->bootloader, null, '510-($-$$)', '0'))
            ->include(new DefineByte($this->bootloader, null, new Hex(0x55)))
            ->include(new DefineByte($this->bootloader, null, new Hex(0xAA)));
    }
}