<?php

declare(strict_types=1);

namespace PHPOS\Assembly\Processor;

interface ProcessorInterface
{
    public function process(): string;
}
