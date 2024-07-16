<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS\IO;

use PHPOS\OS\CodeInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class PrintStringTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testPrintString(CodeInterface $code): void
    {
        $result = $code
            ->registerService(\PHPOS\Service\BIOS\IO\PrintString::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
