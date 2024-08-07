<?php

declare(strict_types=1);

namespace PHPOS\Operation;

use PHPOS\Architecture\Architecture;
use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\OperationInterface;
use PHPOS\Architecture\Operation\OperationType;
use PHPOS\Architecture\Operation\SourceInterface;

class Jne implements OperationInterface
{
    public function __construct(protected Architecture $architecture)
    {
    }


    public function process(DestinationInterface $destination, SourceInterface ...$sources): string
    {
        return $this->architecture
            ->runtime()
            ->callRaw(
                <<< __ASM__
                jne %s, %s
                __ASM__,
                $destination,
                ...$sources
            );
    }
}
