<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Architecture\Variable\VariableType;
use PHPOS\OS\CodeInterface;
use PHPOS\Service\BIOS\Standard\Variable;
use PHPOS\Service\ServiceManager;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class VariableTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testVariableWith8Bits(CodeInterface $code): void
    {
        $variable = new Variable(
            $code,
            null,
            $code->architecture()->runtime()
                ->setVariable('variable_name', 'value'),
        );

        $this->assertSame(
            "variable_name:\n  db \"value\", 0\n",
            $variable->process(new ServiceManager())->assemble()
        );
    }


    #[DataProvider('architectures')]
    public function testVariableWith16Bits(CodeInterface $code): void
    {
        $variable = new Variable(
            $code,
            null,
            $code->architecture()->runtime()
                ->setVariable('variable_name', 'value'),
            VariableType::BITS_16
        );

        $this->assertSame(
            "variable_name:\n  dw \"value\", 0\n",
            $variable->process(new ServiceManager())->assemble()
        );
    }
}
