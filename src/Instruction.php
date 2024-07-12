<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Operation\Destination;
use PHPOS\Architecture\Operation\Source;

class Instruction implements InstructionInterface
{
    protected array $instructions = [];

    protected int $indentSize = 0;

    public function __construct(public readonly BootloaderInterface $bootloader)
    {
    }

    public function section(string $name, callable $callback): InstructionInterface
    {
        $instruction = new self($this->bootloader);
        $instruction->instructions[] = ["{$name}:", null, null, $this->indentSize];

        $instruction->indentSize += 2;

        return $callback($instruction);
    }

    public function append(string $operation, mixed $destination = null, mixed ...$sources): InstructionInterface
    {
        $this->instructions[] = [
            new $operation($this->bootloader->architecture()),
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
            $results .= $operation->process($destination, ...$sources) . "\n";
        }

        return $results;
    }
}
