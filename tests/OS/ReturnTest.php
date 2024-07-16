<?php

declare(strict_types=1);

namespace PHPOS\Test\OS;

use PHPOS\OS\CodeInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class ReturnTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testReturn(CodeInterface $bootloader): void
    {
        $result = $bootloader
            ->registerService(\PHPOS\Service\BIOS\IO\PrintDone::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
