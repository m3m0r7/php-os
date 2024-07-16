<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS\Starndard;

use PHPOS\Exception\VariableNotFoundException;
use PHPOS\OS\CodeInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class VariableTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testVariable(CodeInterface $code): void
    {
        $variable = $code->architecture()->runtime()
            ->setVariable('name', 'value');

        $this->assertSame('name', $variable->name());
        $this->assertSame('value', $variable->value());

        $data = $code->architecture()->runtime()->findVariable('name');
        $this->assertSame('name', $data->name());
        $this->assertSame('value', $data->value());
    }

    #[DataProvider('architectures')]
    public function testVariableDidNotDefined(CodeInterface $code): void
    {
        $this->expectException(VariableNotFoundException::class);
        $code->architecture()->runtime()->findVariable('name');
    }
}
