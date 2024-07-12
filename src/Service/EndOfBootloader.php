<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;

class EndOfBootloader implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $variables = $this->bootloader->architecture()->runtime()->variables();
        $db = $variables->get(VariableType::BITS_8);

        return (new Instruction($this->bootloader))
            ->append(\PHPOS\Operation\EndOfBootLoader::class);
    }
}