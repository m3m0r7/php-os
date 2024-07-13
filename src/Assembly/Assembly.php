<?php

declare(strict_types=1);

namespace PHPOS\Assembly;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Assembly\Processor\Readable;
use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Exception\NotImplementedException;
use PHPOS\Stream\StreamWriterInterface;

class Assembly implements AssemblyInterface
{
    public function __construct(protected BootloaderInterface $bootloader, protected array $initializationServices = [], protected array $postServices = [])
    {
    }

    public function saveAsReadable(StreamWriterInterface $streamWriter): AssemblyInterface
    {
        $processor = new Readable(
            $this->bootloader,
            $this->initializationServices,
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
