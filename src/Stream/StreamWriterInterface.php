<?php

declare(strict_types=1);

namespace PHPOS\Stream;

interface StreamWriterInterface
{
    public function write(string $string): StreamWriterInterface;
}
