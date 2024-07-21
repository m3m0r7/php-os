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
use PHPOS\Exception\VariableNotFoundException;
use PHPOS\OS\DefineInterface;
use PHPOS\Service\GUI\StyleInterface;

class Runtime implements RuntimeInterface
{
    protected array $definedReservedBytes = [];
    protected array $definedReservedBytesFromExtern = [];
    protected array $definedVariables = [];
    protected array $definedDefinitions = [];

    public function __construct(
        protected ArchitectureInterface $architecture,
        protected RegisterCollection $registers,
        protected VariableCollection $variables,
        protected OperationCollection $operations,
        protected StyleInterface $style,
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

    public function define(DefineInterface $define): DefineInterface
    {
        $defined = clone $define;
        $this->definedDefinitions[$define->name()] = new KeyValue($define->name(), $define->value());
        return $defined;
    }

    public function reserveBytes(): array
    {
        return $this->definedReservedBytes;
    }

    public function reserveByte(string $name, int $bytes, KeyValueOptionInterface $keyValueOption = new KeyValueOption()): KeyValueInterface
    {
        return $this->definedReservedBytes[$name] = new KeyValue(
            $name,
            $bytes,
            new KeyValueOption(
                aliasName: 'resb_' . $name,
                isGlobal: $keyValueOption->isGlobal(),
                isExtern: $keyValueOption->isExtern(),
            ),
        );
    }

    public function findReserveByte(string $name): KeyValueInterface
    {
        return $this->definedReservedBytes[$name] ?? throw new VariableNotFoundException(
            sprintf(
                'The resb `%s` is not found',
                $name,
            ),
        );
    }

    public function setVariable(string $variableName, string|array $value): KeyValueInterface
    {
        return $this->definedVariables[$variableName] = new KeyValue($variableName, $value);
    }

    public function findVariable(string $variableName): KeyValueInterface
    {
        return $this->definedVariables[$variableName] ?? throw new VariableNotFoundException(
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

    public function definedDefinitions(): array
    {
        return $this->definedDefinitions;
    }

    public function style(): StyleInterface
    {
        return $this->style;
    }
}
