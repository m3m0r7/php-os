<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Operation\x86_64\Entities;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\EntityInterface;
use PHPOS\Architecture\Operation\SourceInterface;

class Ror implements EntityInterface
{
    public function process(DestinationInterface $destination, SourceInterface ...$sources): string
    {
        return rtrim(sprintf(
            <<< __ASM__
            ror %s, %s
            __ASM__,
            (string) $destination,
            implode(", ", array_map(fn (SourceInterface $source) => (string) $source, $sources)),
        ), ', ');
    }
}