<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Architecture\Support\Text;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Service\DefineByte;
use PHPOS\Service\Times;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class DefineByteTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testDefineByteForStringWith8Bits(BootloaderInterface $bootloader): void
    {
        $definedByte = new DefineByte(
            $bootloader,
            null,
            new Text('test'),
        );

        $this->assertSame(
            "db \"test\", 0\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForStringWith16Bits(BootloaderInterface $bootloader): void
    {
        $definedByte = new DefineByte(
            $bootloader,
            null,
            new Text('test'),
            VariableType::BITS_16
        );

        $this->assertSame(
            "dw \"test\", 0\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForHexWith8Bits(BootloaderInterface $bootloader): void
    {
        $definedByte = new DefineByte(
            $bootloader,
            null,
            new Hex(0x29),
        );

        $this->assertSame(
            "db 0x29\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForHexWith16Bits(BootloaderInterface $bootloader): void
    {
        $definedByte = new DefineByte(
            $bootloader,
            null,
            new Hex(0xee29, 16),
            VariableType::BITS_16
        );

        $this->assertSame(
            "dw 0xEE29\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForHexWith16BitsZeroFilled(BootloaderInterface $bootloader): void
    {
        $definedByte = new DefineByte(
            $bootloader,
            null,
            new Hex(0x29, 16),
            VariableType::BITS_16
        );

        $this->assertSame(
            "dw 0x0029\n",
            $definedByte->process()->assemble()
        );
    }
}
