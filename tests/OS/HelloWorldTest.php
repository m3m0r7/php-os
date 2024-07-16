<?php

declare(strict_types=1);

namespace PHPOS\Test\OS;

use PHPOS\OS\CodeInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class HelloWorldTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testHelloWorld(CodeInterface $bootloader): void
    {
        $result = $bootloader
            ->registerService(\PHPOS\Service\BIOS\Standard\DefineBitSize::class, \PHPOS\OS\BitType::BIT_16)
            ->registerService(\PHPOS\Service\BIOS\Standard\DefineOrigin::class, \PHPOS\OS\OSInfo::MBR->value)
            ->registerService(\PHPOS\Service\Kit\Startup\HelloWorld::class)
            ->registerPostService(\PHPOS\Service\BIOS\Bootloader\BootloaderSignature::class)
            ->assemble()
            ->asText();

        $this->assertMatchesTextSnapshot(
            $result,
        );
    }
}
