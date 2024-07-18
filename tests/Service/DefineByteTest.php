<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Architecture\Support\Hex;
use PHPOS\Architecture\Support\Text;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\Standard\DefineByte;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class DefineByteTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testDefineByteForStringWith8Bits(CodeInterface $code): void
    {
        $definedByte = new DefineByte(
            $code,
            null,
            VariableType::BITS_8,
            new Text('test'),
        );

        $this->assertSame(
            "db \"test\", 0\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForStringWith16Bits(CodeInterface $code): void
    {
        $definedByte = new DefineByte(
            $code,
            null,
            VariableType::BITS_16,
            new Text('test')
        );

        $this->assertSame(
            "dw \"test\", 0\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForHexWith8Bits(CodeInterface $code): void
    {
        $definedByte = new DefineByte(
            $code,
            null,
            VariableType::BITS_8,
            new Hex(0x29),
        );

        $this->assertSame(
            "db 0x0029\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForHexWith16Bits(CodeInterface $code): void
    {
        $definedByte = new DefineByte(
            $code,
            null,
            VariableType::BITS_16,
            new Hex(0xee29, 16)
        );

        $this->assertSame(
            "dw 0xEE29\n",
            $definedByte->process()->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testDefineByteForHexWith16BitsZeroFilled(CodeInterface $code): void
    {
        $definedByte = new DefineByte(
            $code,
            null,
            VariableType::BITS_16,
            new Hex(0x29, 16)
        );

        $this->assertSame(
            "dw 0x0029\n",
            $definedByte->process()->assemble()
        );
    }
}
