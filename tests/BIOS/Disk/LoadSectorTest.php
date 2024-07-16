<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS\Disk;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\Disk\LoadSector;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class LoadSectorTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testPrintString(CodeInterface $code): void
    {
        $result = $code
            ->registerService(LoadSector::class, $code)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
