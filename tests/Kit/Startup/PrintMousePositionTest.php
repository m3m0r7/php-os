<?php

declare(strict_types=1);

namespace PHPOS\Test\Kit\Startup;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\Kit\Startup\PrintMousePosition;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class PrintMousePositionTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testHelloWorld(CodeInterface $code): void
    {
        $result = $code
            ->registerService(\PHPOS\Service\BIOS\Standard\DefineBitSize::class, \PHPOS\OS\BitType::BIT_16)
            ->registerService(\PHPOS\Service\BIOS\Standard\DefineOrigin::class, \PHPOS\OS\OSInfo::MBR->value)
            ->registerService(PrintMousePosition::class)
            ->registerPostService(\PHPOS\Service\BIOS\Bootloader\BootloaderSignature::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
