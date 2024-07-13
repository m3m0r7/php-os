<?php

declare(strict_types=1);
namespace PHPOS\Stream;

use PHPOS\Exception\StreamException;

class File implements StreamInterface
{
    public function __construct(protected $handle)
    {
        if (!is_resource($this->handle)) {
            throw new StreamException('The handle is not a file resource');
        }
    }

    public function read(int $bytes): string
    {
        if ($bytes <= 0) {
            throw new StreamException('The reading bytes not allowed equaling zero or negative');
        }
        $read = fread($this->handle, $bytes);

        if ($read === false) {
            throw new StreamException('The fread was failed because unknown reason');
        }

        return $read;
    }

    public function tell(): int
    {
        $tell = ftell($this->handle);
        if ($tell === false) {
            throw new StreamException('The ftell was failed because unknown reason');
        }
        return $tell;
    }

    public function write(string $string): StreamWriterInterface
    {
        $result = fwrite($this->handle, $string);
        if ($result === false) {
            throw new StreamException('The fwrite was failed because unknown reason');
        }
        return $this;
    }
}
