<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Cmp;
use PHPOS\Operation\Hlt;
use PHPOS\Operation\Je;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class SetVESABIOSExtensionError implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $registers = $this->code->architecture()->runtime()->registers();

        $printStringService = $serviceComponent->createServiceWithParent(
            PrintConstantString::class,
            $this,
            'Could not set VESA mode!',
        );

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_32);
        assert($ac instanceof DataRegisterInterface);

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) =>
                $instruction
                    ->append(Cmp::class, $ac->value(), 0x004F)
                    ->append(Je::class, $this->label() . '_success')
                    ->include($printStringService)
                    // Stop to run CPU
                    ->append(Hlt::class)
                    ->label($this->label() . '_success')
            );
    }
}
