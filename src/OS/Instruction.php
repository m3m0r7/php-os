<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\Operation\Destination;
use PHPOS\Architecture\Operation\Source;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;
use Traversable;

class Instruction implements InstructionInterface, \IteratorAggregate
{
    protected const CALLEE = 0;
    protected const DESTINATION = 1;
    protected const SOURCES = 2;
    protected const INDENT = 3;

    protected array $instructions = [];

    protected array $includedServices = [];

    public function __construct(public readonly CodeInterface $code, protected readonly ServiceManagerInterface $serviceManager, protected int $indentSize = 0)
    {
    }

    public function section(string $name, callable $callback = null): InstructionInterface
    {
        $new = new self(
            $this->code,
            0,
        );
        $this->instructions[] = ["section {$name}", null, null, 2];
        $this->instructions = [
            ...$this->instructions,
            ...($callback ? $callback($new) : []),
        ];

        return $this;
    }

    public function label(string $name, callable $callback = null): InstructionInterface
    {
        $new = new self(
            $this->code,
            $this->serviceManager,
            $this->indentSize + 2,
        );
        $this->instructions[] = ["{$name}:", null, null, $this->indentSize];
        $this->instructions = [
            ...$this->instructions,
            ...($callback ? $callback($new) : []),
        ];
        return $this;
    }

    public function include(ServiceInterface $service): self
    {
        if (in_array($service->label(), $this->includedServices, true)) {
            return $this;
        }
        $this->includedServices[] = $service->label();
        foreach ($service->process($this->serviceManager)->instructions as $record) {
            $record[self::INDENT] += $this->indentSize;
            $this->instructions[] = $record;
        }
        return $this;
    }

    public function merge(InstructionInterface ...$instructions): self
    {
        foreach ($instructions as $instruction) {
            foreach ($instruction->valueOf() as $record) {
                $this->instructions[] = $record;
            }
        }

        return $this;
    }

    public function append(string|callable $operation, mixed $destination = null, mixed ...$sources): InstructionInterface
    {
        $this->instructions[] = [
            self::CALLEE => is_callable($operation)
                ? $operation
                : new $operation($this->code->architecture()),
            self::DESTINATION => new Destination($destination),
            self::SOURCES => array_map(fn ($source) => new Source($source), $sources),
            self::INDENT => $this->indentSize,
        ];

        return $this;
    }

    public function assemble(): string
    {
        $results = '';

        foreach ($this->instructions as [$operation, $destination, $sources, $indentSize]) {
            $results .= str_repeat(' ', $indentSize);
            if (is_string($operation)) {
                $results .= $operation . "\n";
                continue;
            }
            if (is_callable($operation)) {
                $results .= $operation($destination, ...$sources) . "\n";
                continue;
            }
            $results .= $operation->process($destination, ...$sources) . "\n";
        }

        return $results;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->instructions);
    }

    public function valueOf(): array
    {
        return $this->instructions;
    }
}
