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
use PHPOS\Service\ServiceManagerInterface;

class PrintInputtedText implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $enter = $serviceManager->createServiceWithParent(
            PrintConstantString::class,
            $this,
            'Enter text: '
        );

        $readText = $serviceManager->createServiceWithParent(
            ReadConstantString::class,
            $this,
        );

        $entered = $serviceManager->createServiceWithParent(
            PrintConstantString::class,
            $this,
            'Your entered: '
        );

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->include($enter)
                    ->include($readText)
                    ->include($serviceManager->createServiceWithParent(PrintNewLine::class, $this))
                    ->include($entered)
                    ->include($serviceManager->createServiceWithParent(
                        PrintConstantString::class,
                        $this,
                        $readText->extern()->get($readText->label() . '_buffer'),
                    ))
                    ->include($serviceManager->createServiceWithParent(PrintNewLine::class, $this))
                    ->append(Jmp::class, $this->label())
            )
            ->append(Hlt::class);
    }
}
