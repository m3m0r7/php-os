<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;
use PHPOS\Operation\Jmp;

class Start implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->bootloader->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR);

        assert($ac instanceof DataRegisterInterface);

        $return = new Return_($this->bootloader, $this);
        $printCharacter = new PrintCharacter($this->bootloader, $this, $ac->high());

        return (new Instruction($this->bootloader))
            ->section(
                'start',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Jmp::class, 'main'),
            );
    }
}
