<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Architecture\Variable\VariableType;
use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\Standard\Times;
use PHPOS\Service\ServiceManager;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class TimesTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testTimesWith8Bits(CodeInterface $code): void
    {
        $times = new Times(
            $code,
            null,
            'test',
            '0',
        );

        $this->assertSame(
            "times test db 0\n",
            $times->process(new ServiceManager\ServiceComponent(new ServiceManager($code), $code))->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testTimesWith16Bits(CodeInterface $code): void
    {
        $times = new Times(
            $code,
            null,
            'test',
            '0',
            VariableType::BITS_16
        );

        $this->assertSame(
            "times test dw 0\n",
            $times->process(new ServiceManager\ServiceComponent(new ServiceManager($code), $code))->assemble()
        );
    }
}
