<?php

declare(strict_types=1);

namespace PHPOS\Test\Bootloader;

use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Exception\VariableNotFoundException;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class VariableTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testVariable(BootloaderInterface $bootloader): void
    {
        $variable = $bootloader->architecture()->runtime()
            ->setVariable('name', 'value');

        $this->assertSame('name', $variable->name());
        $this->assertSame('value', $variable->value());

        $data = $bootloader->architecture()->runtime()->findVariable('name');
        $this->assertSame('name', $data->name());
        $this->assertSame('value', $data->value());
    }

    #[DataProvider('architectures')]
    public function testVariableDidNotDefined(BootloaderInterface $bootloader): void
    {
        $this->expectException(VariableNotFoundException::class);
        $bootloader->architecture()->runtime()->findVariable('name');
    }
}
