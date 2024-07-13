<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;

class EndOfBootLoader implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        return (new Instruction($this->bootloader))
            ->append(function () {
                $variables = $this->bootloader->architecture()->runtime()->variables();
                $db = $variables->get(VariableType::BITS_8);

                return $this
                    ->bootloader
                    ->architecture()
                    ->runtime()
                    ->callRaw(
                        <<< __ASM__
                        times 510-($-$$) {$db->realName()} 0
                        {$db->realName()} 0x55
                        {$db->realName()} 0xAA
                        __ASM__,
                    );
            });
    }
}