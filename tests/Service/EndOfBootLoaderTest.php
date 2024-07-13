<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class EndOfBootLoaderTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testEndOfBootLoader(BootloaderInterface $bootloader): void
    {
        $bootloader
            ->registerInitializationService(\PHPOS\Service\EndOfBootLoader::class)
            ->assemble()
            ->saveAsReadable($this->result);

        $this->assertMatchesTextSnapshot(
            $this->result->all(),
        );
    }
}
