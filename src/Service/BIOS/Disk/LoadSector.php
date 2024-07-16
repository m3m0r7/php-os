<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Operation\Int_;
use PHPOS\Operation\Jc;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Ret;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\BIOS;
use PHPOS\Service\ServiceInterface;

class LoadSector implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        [$code] = $this->parameters + [null];
        assert($code instanceof CodeInterface);

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $base = $registers->get(RegisterType::BASE_BITS_16);
        assert($base instanceof DataRegisterWithHighAndLowInterface);

        $counter = $registers->get(RegisterType::COUNTER_BITS_16);
        assert($counter instanceof DataRegisterWithHighAndLowInterface);

        $data = $registers->get(RegisterType::DATA_BITS_16);
        assert($data instanceof DataRegisterWithHighAndLowInterface);

        $sector = $this->code
            ->architecture()
            ->runtime()
            ->define($code->sector());

        $sectors = $this->code
            ->architecture()
            ->runtime()
            ->define($code->sectors());

        $head = $this->code
            ->architecture()
            ->runtime()
            ->define($code->head());


        $drive = $this->code
            ->architecture()
            ->runtime()
            ->define($code->drive());

        $diskError = new DiskError($this->code);

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                    $instruction
                        // Load position
                        ->append(Mov::class, $base->value(), $code->origin())

                        // Call BIOS read sector function
                        ->append(Mov::class, $ac->high(), new Hex(BIOS::READ->value))

                        // Number of sectors
                        ->append(Mov::class, $ac->low(), $sectors)

                        // Cylinder
                        ->append(
                            Mov::class,
                            $counter->high(),

                            // TODO: Implements here if you needed
                            new Hex(0x00)
                        )

                        // Sector of starting at
                        ->append(Mov::class, $counter->low(), $sector)

                        // Head
                        ->append(Mov::class, $data->high(), $head)

                        // Drive
                        ->append(Mov::class, $data->low(), $drive)

                        // Disk interrupt
                        ->append(Int_::class, BIOS::DISK_INTERRUPT->value)

                        // Disk error
                        ->append(Jc::class, $diskError->label())

                        // Jump to loaded origin
                        ->append(Jmp::class, new Hex($code->origin(), 16))

                        ->append(Ret::class)
            )
            ->include($diskError);
    }
}