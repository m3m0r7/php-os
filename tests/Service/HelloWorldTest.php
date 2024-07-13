<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class HelloWorldTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testHelloWorld(BootloaderInterface $bootloader): void
    {
        $bootloader->architecture()->runtime()
            ->setVariable('hello_world', 'Hello World!');

        $bootloader
            ->registerInitializationService(\PHPOS\Service\HelloWorld::class)
            ->registerInitializationService(\PHPOS\Service\PrintString::class)
            ->registerPostService(\PHPOS\Service\EndOfBootLoader::class)
            ->assemble()
            ->saveAsReadable($this->result);

        $this->assertMatchesTextSnapshot(
            $this->result->all(),
        );
    }
}
