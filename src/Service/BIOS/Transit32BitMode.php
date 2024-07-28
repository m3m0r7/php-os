<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS;

use PHPOS\Operation\Cli;
use PHPOS\Operation\Jmp;
use PHPOS\Operation\Lgdt;
use PHPOS\OS\BitType;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Standard\DefineBitSize;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderImageFromInline;
use PHPOS\Service\Component\Address\Indirect;
use PHPOS\Service\Component\Address\SegmentBased;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class Transit32BitMode implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $toBe32BitsLabel = $this->label() . '_32bits_mode';

        $GDT = $serviceManager->createService(GlobalDescriptorTable::class);

        $setupSegment = new SetupSegments(
            $this->code,
            $this,

            // Set starting data segment when initializing
            BIOS::GDT_ENABLED_DATA_SEGMENT,

            // NOTE: Disable setting BIOS interrupt
            false,
        );

        $defineBits = $serviceManager->createServiceWithParent(
            DefineBitSize::class,
            $this,
            BitType::BIT_32,
        );

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Lgdt::class, new Indirect($GDT->label()))
                    ->include(new ProtectionMode($this->code, $this, true))

                    // Clearing BIOS Interrupt in 32 bits protection mode
                    ->append(Cli::class)
                    ->append(
                        Jmp::class,
                        (string) new SegmentBased(BIOS::GDT_ENABLED_CODE_SEGMENT, $toBe32BitsLabel)
                    ),
            )
            ->include($defineBits)
            ->label(
                $this->label() . '_32bits_mode',
                fn (InstructionInterface $instruction) => $instruction
                    ->include($setupSegment),
            );
    }
}
