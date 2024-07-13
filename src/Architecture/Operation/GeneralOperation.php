<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation;

trait GeneralOperation
{
    public function process(DestinationInterface $destination, SourceInterface ...$sources): string
    {
        return sprintf(
            <<< __ASM__
            %s %s
            __ASM__,
            $this->name(),
            implode(
                ", ",
                [
                    (string) $destination,
                    ...array_map(fn (SourceInterface $source) => (string) $source, $sources),
                ],
            )
        );
    }
}
