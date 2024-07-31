<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Add;
use PHPOS\Operation\Call;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Loop;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Pop;
use PHPOS\Operation\Push;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\OS\OSInfo;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\BIOS\Disk\LBA\LBAError;
use PHPOS\Service\BIOS\Disk\LBA\UpdateCHSAddress;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class LoadSectorWithLBA implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        [$code] = $this->parameters + [null];
        assert($code instanceof CodeInterface);

        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $base = $registers->get(RegisterType::BASE_BITS_16);
        assert($ac instanceof DataRegisterInterface);

        $counter = $registers->get(RegisterType::COUNTER_BITS_16);
        assert($counter instanceof DataRegisterWithHighAndLowInterface);

        $updateCHSAddress = $serviceComponent->createServiceWithParent(UpdateCHSAddress::class, $this);
        $error = $serviceComponent->createServiceWithParent(LBAError::class, $this);

        $sectors = $this->code
            ->architecture()
            ->runtime()
            ->define($code->sectors());

        return (new Instruction($this->code, $serviceComponent))
            ->append(Mov::class, $counter->value(), $sectors->value())
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Push::class, $counter->value())

                    ->append(Mov::class, $ac->high(), 0x02)
                    ->append(Mov::class, $ac->low(), 0x01)
                    ->append(Int_::class, BIOS::DISK_INTERRUPT->value)


                    ->append(Call::class, $updateCHSAddress->label())
                    ->append(Add::class, $base->value(), OSInfo::PAGE_SIZE)

                    ->append(Pop::class, $counter->value())
                    ->append(Loop::class, $this->label()),
            )
            ->include($updateCHSAddress)
            ->include($error);
    }
}
