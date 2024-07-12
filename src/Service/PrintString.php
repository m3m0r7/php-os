<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\BootloaderInterface;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;
use PHPOS\Operation\Call;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Jz;
use PHPOS\Operation\Lodsb;
use PHPOS\Operation\Or_;

class PrintString implements ServiceInterface
{
    use BaseService;

    public function __construct(protected BootloaderInterface $bootloader)
    {}

    public function process(): InstructionInterface
    {
        $registers = $this->bootloader->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR);

        assert($ac instanceof DataRegisterInterface);

        return (new Instruction($this->bootloader))
            ->section(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                    $instruction
                        ->append(Lodsb::class)
                        ->append(Or_::class, $ac->low(), $ac->low())
                        ->append(Jz::class, new Return_($this->bootloader))
                        ->append(Call::class, new PrintCharacter($this->bootloader, $ac->high()))
                        ->append(Jmp::class, $this)
            );
    }
}
