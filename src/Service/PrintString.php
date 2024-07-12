<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\InstructionInterface;

class PrintString implements ServiceInterface
{
    use BaseService;

    public function assemble(): InstructionInterface
    {
        $registers = $this->instruction->bootloader->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR);

        assert($ac instanceof DataRegisterInterface);

        return $this->instruction
            ->lodsb()
            ->or($ac->low(), $ac->low())
            ->jz(Return_::class)
            ->call(PrintCharacter::class, $ac->high())
            ->jmp(self::class);
    }
}
