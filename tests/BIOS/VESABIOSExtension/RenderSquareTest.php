<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS\VESABIOSExtension;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Service\BIOS\VESABIOSExtension\LoadVESAVideoAddress;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderSquare;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtension;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtensionInformation;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class RenderSquareTest extends TestCase
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

            ->registerService(
                \PHPOS\Service\BIOS\VESABIOSExtension\Renderer\SetRenderPosition::class,
                100,
                100,
                \PHPOS\Service\Component\VESA\AlignType::CENTER_CENTER,
            )

            ->registerService(RenderSquare::class, 100, 100)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
