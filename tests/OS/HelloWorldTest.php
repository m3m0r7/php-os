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
        $bootloader->architecture()->runtime()
            ->setVariable('hello_world', 'Hello World!');

        $bootloader
            ->registerService(\PHPOS\Service\Kit\Startup\HelloWorld::class)
            ->registerService(\PHPOS\Service\BIOS\IO\PrintString::class)
            ->registerPostService(\PHPOS\Service\BIOS\Bootloader\BootloaderSignature::class)
            ->assemble()
            ->saveAsReadable($this->result);

        $this->assertMatchesTextSnapshot(
            $this->result->all(),
        );
    }
}
