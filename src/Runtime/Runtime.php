<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\OperationCollection;
use PHPOS\Architecture\Operation\OperationType;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Architecture\Variable\VariableCollection;
use PHPOS\Exception\PHPOSException;

class Runtime implements RuntimeInterface
{
    protected array $definedVariables = [];

    public function __construct(
        protected ArchitectureInterface $architecture,
        protected RegisterCollection $registers,
        protected VariableCollection $variables,
        protected OperationCollection $operations,
    ) {
    }

    public function __debugInfo()
    {
        return [];
    }

    public function registers(): RegisterCollection
    {
        return $this->registers;
    }

    public function variables(): VariableCollection
    {
        return $this->variables;
    }

    public function operations(): OperationCollection
    {
        return $this->operations;
    }

    public function call(OperationType $operationType, DestinationInterface $destination, SourceInterface ...$sources): string
    {
        $operation = $this->operations->get($operationType);
        return (new $operation())
            ->process($destination, ...$sources);
    }

    public function callRaw(string $asm, DestinationInterface|null $destination = null, SourceInterface ...$sources): string
    {
        return rtrim(sprintf(
            $asm,
            (string) ($destination ?? ''),
            implode(", ", array_map(fn (SourceInterface $source) => (string) $source, $sources)),
        ), ', ');
    }

    public function setVariable(string $variableName, string $value): VariableDefinitionInterface
    {
        return $this->definedVariables[$variableName] = new VariableDefinition($variableName, $value);
    }

    public function findVariable(string $variableName): VariableDefinitionInterface
    {
        return $this->definedVariables[$variableName] ?? throw new PHPOSException(
            sprintf(
                'The variable `%s` is not found',
                $variableName,
            ),
        );
    }

    public function definedVariables(): array
    {
        return $this->definedVariables;
    }
}
