<?php

declare(strict_types=1);

namespace PHPOS\Service\Kit\Startup;

use PHPOS\Operation\Hlt;
use PHPOS\Operation\Jmp;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\OS\OSInfo;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintConstantString;
use PHPOS\Service\BIOS\IO\PrintConstantString\PrintNewLine;
use PHPOS\Service\BIOS\IO\ReadConstantString\ReadConstantString;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class PrintInputtedText implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $enter = $serviceComponent->createServiceWithParent(
            PrintConstantString::class,
            $this,
            'Enter text: '
        );

        $readText = $serviceComponent->createServiceWithParent(
            ReadConstantString::class,
            $this,
        );

        $entered = $serviceComponent->createServiceWithParent(
            PrintConstantString::class,
            $this,
            'Your entered: '
        );

        return (new Instruction($this->code, $serviceComponent))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->include($enter)
                    ->include($readText)
                    ->include($serviceComponent->createServiceWithParent(PrintNewLine::class, $this))
                    ->include($entered)
                    ->include($serviceComponent->createServiceWithParent(
                        PrintConstantString::class,
                        $this,
                        $readText->extern()->get($readText->label() . '_buffer'),
                    ))
                    ->include($serviceComponent->createServiceWithParent(PrintNewLine::class, $this))
                    ->append(Jmp::class, $this->label())
            )
            ->append(Hlt::class);
    }
}
