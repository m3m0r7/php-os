<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\OperationCollection;
use PHPOS\Architecture\Operation\OperationType;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Architecture\Variable\VariableCollection;
use PHPOS\OS\DefineInterface;

interface RuntimeInterface
{
    public function registers(): RegisterCollection;
    public function variables(): VariableCollection;
    public function operations(): OperationCollection;
    public function call(OperationType $operationType, DestinationInterface $destination, SourceInterface ...$sources): string;
    public function callRaw(string $asm, DestinationInterface|null $destination = null, SourceInterface ...$sources): string;
    public function setVariable(string $variableName, string|array $value): KeyValueInterface;
    public function findVariable(string $variableName): KeyValueInterface;
    public function definedVariables(): array;
    public function define(DefineInterface $define): DefineInterface;
    public function definedDefinitions(): array;
    public function reserveByte(string $name, int $bytes, KeyValueOptionInterface $keyValueOption): KeyValueInterface;
    public function findReserveByte(string $name): KeyValueInterface;
    public function reserveBytes(): array;
}
