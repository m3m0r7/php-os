<?php

declare(strict_types=1);

namespace BIOS\VESABIOSExtension;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\IO\PrintConstantString;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Service\BIOS\VESABIOSExtension\LoadVESAVideoAddress;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtension;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtensionInformation;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class PrintConstantStringTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testRenderImage(CodeInterface $code): void
    {
        $result = $code
            ->registerService(SetupSegments::class)
            ->registerService(SetVESABIOSExtension::class)
            ->registerService(SetVESABIOSExtensionInformation::class)
            ->registerService(LoadVESAVideoAddress::class)

            ->registerService(PrintConstantString::class, "Hello World!")
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
