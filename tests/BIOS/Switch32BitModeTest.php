<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS;

use PHPOS\OS\CodeInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class Switch32BitModeTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testSwitch32BitMode(CodeInterface $code): void
    {
        $result = $code
            ->registerService(\PHPOS\Service\BIOS\Switch32BitMode::class)
            ->registerService(\PHPOS\Service\BIOS\System\Halt::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
