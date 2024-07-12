<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\BootloaderInterface;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;
use PHPOS\Operation\Ret;

class Return_ implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        return (new Instruction($this->bootloader))
            ->section(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Ret::class)
            );
    }
}
