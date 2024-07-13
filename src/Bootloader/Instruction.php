<?php
declare(strict_types=1);
namespace PHPOS\Bootloader;

use PHPOS\Architecture\Operation\Destination;
use PHPOS\Architecture\Operation\Source;
use PHPOS\Service\ServiceInterface;
use Traversable;

class Instruction implements InstructionInterface, \IteratorAggregate
{
    protected array $instructions = [];

    protected int $indentSize = 0;

    public function __construct(public readonly BootloaderInterface $bootloader)
    {
    }

    public function section(string $name, callable $callback): InstructionInterface
    {
        $instruction = new self($this->bootloader);
        $instruction = $instruction->merge($this);
        $instruction->instructions[] = ["{$name}:", null, null, $this->indentSize];

        $instruction->indentSize += 2;

        return $callback($instruction);
    }

    public function include(ServiceInterface $service): self
    {
        return $this->merge($service->process());
    }

    public function merge(InstructionInterface $instruction): self
    {
        $new = new self($this->bootloader);
        foreach ($this->instructions as $record) {
            $new->instructions[] = $record;
        }
        foreach ($instruction->valueOf() as $record) {
            $new->instructions[] = $record;
        }

        return $new;
    }

    public function append(string|callable $operation, mixed $destination = null, mixed ...$sources): InstructionInterface
    {
        $this->instructions[] = [
            is_callable($operation)
                ? $operation
                : new $operation($this->bootloader->architecture()),
            new Destination($destination),
            array_map(fn ($source) => new Source($source), $sources),
            $this->indentSize,
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
