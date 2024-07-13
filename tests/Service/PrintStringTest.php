<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class PrintStringTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testPrintString(BootloaderInterface $bootloader): void
    {
        $bootloader
            ->registerInitializationService(\PHPOS\Service\PrintString::class)
            ->assemble()
            ->saveAsReadable($this->result);

        $this->assertMatchesTextSnapshot(
            $this->result->all(),
        );
    }
}
