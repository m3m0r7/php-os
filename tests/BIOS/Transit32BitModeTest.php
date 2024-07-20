<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\EnableA20Line;
use PHPOS\Service\BIOS\Standard\Segment\SetupSegments;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class Transit32BitModeTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testTransit32BitMode(CodeInterface $code): void
    {
        $result = $code
            ->registerService(EnableA20Line::class)
            ->registerService(SetupSegments::class)
            ->registerService(\PHPOS\Service\BIOS\Transit32BitMode::class)
            ->registerService(\PHPOS\Service\BIOS\System\Halt::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
