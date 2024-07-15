<?php

declare(strict_types=1);

namespace PHPOS\Assembly;

use PHPOS\Assembly\Processor\Readable;
use PHPOS\Exception\NotImplementedException;
use PHPOS\OS\CodeInterface;
use PHPOS\Stream\StreamWriterInterface;

class Assembly implements AssemblyInterface
{
    public function __construct(protected CodeInterface $bootloader, protected array $services = [], protected array $postServices = [])
    {
    }

    public function saveAsReadable(StreamWriterInterface $streamWriter): AssemblyInterface
    {
        $processor = new Readable(
            $this->bootloader,
            $this->services,
            $this->postServices,
        );

        $streamWriter->write($processor->process());

        return $this;
    }

    public function saveAsBinary(StreamWriterInterface $streamWriter): AssemblyInterface
    {
        throw new NotImplementedException('The bootloader cannot be created');
    }
}
