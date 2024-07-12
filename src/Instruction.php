<?php
declare(strict_types=1);
namespace PHPOS;

class Instruction implements InstructionInterface
{
    protected array $instructions = [];

    public function __construct(public readonly BootloaderInterface $bootloader)
    {
    }

    public function raw(OperationInterface $operation): InstructionInterface
    {
        $new = clone $this;
        $new->instructions[] = $operation;

        return $new;
    }
}
