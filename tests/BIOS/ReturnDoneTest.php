<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS;

use PHPOS\OS\CodeInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class ReturnDoneTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testReturnDone(CodeInterface $code): void
    {
        $result = $code
            ->registerService(\PHPOS\Service\BIOS\IO\PrintDone::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
