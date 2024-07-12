<?php
declare(strict_types=1);
namespace PHPOS\Operation;

interface OperationInterface
{
    public function process(Destination $destination, Source ...$source): void;
}
