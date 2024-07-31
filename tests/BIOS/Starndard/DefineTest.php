<?php

declare(strict_types=1);

namespace PHPOS\Test\BIOS\Starndard;

use PHPOS\Operation\Mov;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Define;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponent;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;
use PHPOS\Service\ServiceManagerInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class DefineTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testDefinition(CodeInterface $code): void
    {
        $definition = $code->architecture()->runtime()
            ->define(new Define('name', 'value'));

        $this->assertSame('name', $definition->name());
        $this->assertSame('value', $definition->value());
    }

    #[DataProvider('architectures')]
    public function testDefinitionInAssembly(CodeInterface $code): void
    {
        $service = new class ($code) implements ServiceInterface {
            use BaseService;

            public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
            {
                $definedForTested = $this
                    ->code
                    ->architecture()
                    ->runtime()
                    ->define(new Define('name', 'value'));

                return (new Instruction($this->code, $serviceComponent))
                    ->append(Mov::class, $definedForTested);
            }
        };

        $code->registerService($service::class);

        $this->assertMatchesRegularExpression(
            // NOTE: PHPUnit did not detect ^ and $
            '/(\n|^)%define name value(\n|$)/',
            $code->assemble()->asText(),
        );
    }
}
