<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS\VESABIOSExtension;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Service\BIOS\VESABIOSExtension\LoadVESAVideoAddress;
use PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderImageFromInline;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtension;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtensionInformation;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class RenderImageFromInlineTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testRenderImageFromInline(CodeInterface $code): void
    {
        $image = new \PHPOS\Service\Component\Image\Image(__DIR__ . '/../../../doc/logo.png');

        $result = $code
            ->registerService(SetupSegments::class)
            ->registerService(SetVESABIOSExtension::class)
            ->registerService(SetVESABIOSExtensionInformation::class)
            ->registerService(LoadVESAVideoAddress::class)

            ->registerService(
                \PHPOS\Service\BIOS\VESABIOSExtension\Renderer\SetRenderPosition::class,
                $image->width(),
                $image->height(),
                \PHPOS\Service\Component\VESA\AlignType::CENTER_CENTER,
            )

            ->registerService(RenderImageFromInline::class, $image)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
