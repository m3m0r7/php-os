<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;

class PrintCharacter implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$register] = $this->parameters;

        return (new Instruction($this->bootloader))
            ->section(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                $instruction
                    ->append(Mov::class, $register, new Hex(0x0E))
                    ->append(Int_::class, new Hex(0x10))
                    ->append(Ret::class)
            );
    }
}
