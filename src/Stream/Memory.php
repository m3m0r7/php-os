<?php

declare(strict_types=1);

namespace PHPOS\Stream;

use PHPOS\Exception\StreamException;

class Memory implements StreamInterface
{
    private File $handle;
    /**
     * @var resource
     */
    private $original;

    public function __construct()
    {
        $this->handle = new File($this->original = fopen('php://memory', 'r+'));
        if ($this->original === false) {
            throw new StreamException('Cannot open on-memory stream');
        }
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

    public function seek(int $pos, int $whence = SEEK_SET): StreamReaderInterface
    {
        return $this->handle->seek($pos, $whence);
    }

    public function all(): string
    {
        $this->seek(0);
        return stream_get_contents($this->original);
    }
}
