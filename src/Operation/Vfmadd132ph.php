<?php
declare(strict_types=1);
namespace PHPOS\Operation;

use PHPOS\Architecture\Architecture;
use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\OperationInterface;
use PHPOS\Architecture\Operation\OperationType;
use PHPOS\Architecture\Operation\SourceInterface;

class Vfmadd132ph implements OperationInterface
{
    public function __construct(protected Architecture $architecture)
    {
    }


    public function process(DestinationInterface $destination, SourceInterface ...$sources): string
    {
        return $this->architecture
            ->runtime()
            ->call(
                OperationType::VFMADD132PH,
                $destination,
                ...$sources
            );
    }
}
