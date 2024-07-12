<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\OperationCollection;
use PHPOS\Architecture\Operation\OperationType;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Architecture\Variable\VariableCollection;

class Runtime implements RuntimeInterface
{
    public function __construct(
        protected RegisterCollection $registers,
        protected VariableCollection $variables,
        protected OperationCollection $operations,
    )
    {
    }

    public function __debugInfo() {
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

    public function raw(string $asm, DestinationInterface $destination, SourceInterface ...$sources): string
    {
        return rtrim(sprintf(
            $asm,
            (string) $destination,
            implode(", ", array_map(fn (SourceInterface $source) => (string) $source, $sources)),
        ), ', ');
    }
}
