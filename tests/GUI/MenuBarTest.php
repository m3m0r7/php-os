<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Service\BIOS\VESABIOSExtension\LoadVESAVideoAddress;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtension;
use PHPOS\Service\BIOS\VESABIOSExtension\SetVESABIOSExtensionInformation;
use PHPOS\Service\GUI\MenuBar;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class MenuBarTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testFillScreen(CodeInterface $code): void
    {
        $result = $code
            ->registerService(SetupSegments::class)
            ->registerService(SetVESABIOSExtension::class)
            ->registerService(SetVESABIOSExtensionInformation::class)
            ->registerService(LoadVESAVideoAddress::class)

            ->registerService(MenuBar::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
