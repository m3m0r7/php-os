<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Operation;

interface OperationInterface
{
    public function process(DestinationInterface $destination, SourceInterface ...$sources): string;
}
