<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS\System;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\System\CallCode;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class CallCodeTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testPrintString(CodeInterface $code): void
    {
        $result = $code
            ->registerService(CallCode::class, $code)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
