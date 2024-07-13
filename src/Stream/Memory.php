<?php

declare(strict_types=1);
namespace PHPOS\Stream;

use PHPOS\Exception\StreamException;

class Memory implements StreamInterface
{
    private File $handle;

    public function __construct()
    {
        $this->handle = new File(fopen('php://memory', 'r'));
    }

    public function read(int $bytes): string
    {
        return $this->handle->read($bytes);
    }

    public function tell(): int
    {
        return $this->handle->tell();
    }

    public function write(string $string): StreamWriterInterface
    {
        return $this->handle->write($string);
    }
}
