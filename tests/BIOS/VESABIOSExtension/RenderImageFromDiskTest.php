<?php

declare(strict_types=1);

namespace BIOS\VESABIOSExtension;

use PHPOS\OS\CodeInfo;
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

class RenderImageFromDiskTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testRenderImageFromDisk(CodeInterface $code): void
    {
        $logo = new \PHPOS\Service\Component\Image\Image(__DIR__ . '/../../../doc/logo.png');

        $image = new \PHPOS\OS\ImageCode(
            $logo,
            clone $code->architecture(),
        );

        $image
            ->setBits(\PHPOS\OS\BitType::BIT_16)
            ->setOrigin(0x3000)
            ->setSectors((int) floor(CodeInfo::CODE_BLOCK_SIZE_BITS_16 / \PHPOS\OS\OSInfo::PAGE_SIZE));

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

            ->registerService(\PHPOS\Service\BIOS\VESABIOSExtension\Renderer\RenderImageFromDisk::class, $image)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
