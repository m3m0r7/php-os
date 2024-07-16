<?php

declare(strict_types=1);

namespace BIOS\Bootloader;

use PHPOS\OS\CodeInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class BootloaderSignatureTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testEndOfBootLoader(CodeInterface $code): void
    {
        $result = $code
            ->registerService(\PHPOS\Service\BIOS\Bootloader\BootloaderSignature::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
