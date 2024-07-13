<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Support\Text;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;

class Variable implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $variables = $this->bootloader->architecture()->runtime()->variables();
        $db = $variables->get(VariableType::BITS_8);

        [$name, $value] = $this->parameters;

        return (new Instruction($this->bootloader))
            ->append(
                \PHPOS\Operation\Variable::class,
                sprintf(
                    "%s %s",
                    $name,
                    $db->realName(),
                ),
                (new Text($value)),
                0,
            );
    }
}
