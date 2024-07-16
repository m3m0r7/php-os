<?php

declare(strict_types=1);

namespace PHPOS\Test\OS;

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
    public function testEndOfBootLoader(CodeInterface $bootloader): void
    {
        $bootloader
            ->registerService(\PHPOS\Service\BIOS\Bootloader\BootloaderSignature::class)
            ->assemble()
            ->asText($this->result);

        $this->assertMatchesTextSnapshot(
            $this->result->all(),
        );
    }
}
