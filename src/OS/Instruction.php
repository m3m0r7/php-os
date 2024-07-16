<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\Operation\Destination;
use PHPOS\Architecture\Operation\Source;
use PHPOS\Service\ServiceInterface;
use Traversable;

class Instruction implements InstructionInterface, \IteratorAggregate
{
    protected const CALLEE = 0;
    protected const DESTINATION = 1;
    protected const SOURCES = 2;
    protected const INDENT_SIZE = 3;

    protected array $instructions = [];

    protected int $indentSize = 0;

    protected array $includedServices = [];

    public function __construct(public readonly CodeInterface $bootloader)
    {
    }

    public function section(string $name, callable $callback = null): InstructionInterface
    {
        $instruction = new self($this->bootloader);
        $instruction = $instruction->merge($this);

        $instruction->instructions[] = ["section {$name}", null, null, 0];

        // Forcibly to 2 indents
        $instruction->indentSize = 2;

        return $callback ? $callback($instruction) : $instruction;
    }

    public function label(string $name, callable $callback = null): InstructionInterface
    {
        $instruction = new self($this->bootloader);
        $instruction->indentSize = $this->indentSize;
        $instruction = $instruction->merge($this);

        $instruction->instructions[] = ["{$name}:", null, null, $this->indentSize];

        $instruction->indentSize += 2;

        return $callback ? $callback($instruction) : $instruction;
    }

    public function include(ServiceInterface $service): self
    {
        if (in_array($service->label(), $this->includedServices, true)) {
            return $this;
        }
        $this->includedServices[] = $service->label();
        return $this->merge($service->process());
    }

    public function merge(InstructionInterface $instruction): self
    {
        $new = new self($this->bootloader);
        $new->indentSize = $this->indentSize;

        foreach ($this->instructions as $record) {
            $new->instructions[] = $record;
        }
        foreach ($instruction->valueOf() as $record) {
            $record[self::INDENT_SIZE] = $record[self::INDENT_SIZE] + $this->indentSize;
            $new->instructions[] = $record;
        }

        return $new;
    }

    public function append(string|callable $operation, mixed $destination = null, mixed ...$sources): InstructionInterface
    {
        $this->instructions[] = [
            self::CALLEE => is_callable($operation)
                ? $operation
                : new $operation($this->bootloader->architecture()),
            self::DESTINATION => new Destination($destination),
            self::SOURCES => array_map(fn ($source) => new Source($source), $sources),
            self::INDENT_SIZE => $this->indentSize,
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
