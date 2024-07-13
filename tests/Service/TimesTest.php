<?php
declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Service\Times;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class TimesTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testTimesWith8Bits(BootloaderInterface $bootloader): void
    {
        $times = new Times(
            $bootloader,
            null,
            'test',
            '0',
        );

        $this->assertSame(
            "times test db 0\n",
            $times->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testTimesWith16Bits(BootloaderInterface $bootloader): void
    {
        $times = new Times(
            $bootloader,
            null,
            'test',
            '0',
            VariableType::BITS_16
        );

        $this->assertSame(
            "times test dw 0\n",
            $times->process()->assemble()
        );
    }
}
