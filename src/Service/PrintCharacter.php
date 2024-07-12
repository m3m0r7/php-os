<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\BootloaderInterface;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;

class PrintCharacter implements ServiceInterface
{
    use BaseService;

    public function __construct(protected BootloaderInterface $bootloader, protected RegisterInterface $register)
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
                    ->append(Mov::class, $this->register)
                    ->append(Int_::class, 0x10)
                    ->append(Ret::class, $this)
            );
    }
}
