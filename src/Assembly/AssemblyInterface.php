<?php

declare(strict_types=1);

namespace PHPOS\Assembly;

use PHPOS\Stream\StreamWriterInterface;

interface AssemblyInterface
{
    public function asText();
    public function asBinary(): string;
}
