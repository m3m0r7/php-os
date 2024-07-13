<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Service\Variable;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class VariableTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testVariableWith8Bits(BootloaderInterface $bootloader): void
    {
        $times = new Variable(
            $bootloader,
            null,
            $bootloader->architecture()->runtime()
                ->setVariable('variable_name', 'value'),
        );

        $this->assertSame(
            "variable_name:\n  db \"value\", 0\n",
            $times->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testVariableWith16Bits(BootloaderInterface $bootloader): void
    {
        $times = new Variable(
            $bootloader,
            null,
            $bootloader->architecture()->runtime()
                ->setVariable('variable_name', 'value'),
            VariableType::BITS_16
        );

        $this->assertSame(
            "variable_name:\n  dw \"value\", 0\n",
            $times->process()->assemble()
        );
    }
}

