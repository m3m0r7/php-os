<?php

declare(strict_types=1);

namespace PHPOS\Assembly;

use PHPOS\Assembly\Processor\Readable;
use PHPOS\Exception\NotImplementedException;
use PHPOS\OS\CodeInterface;
use PHPOS\Stream\StreamWriterInterface;

class Assembly implements AssemblyInterface
{
    public function __construct(protected CodeInterface $code, protected array $services = [], protected array $postServices = [])
    {
    }

    public function saveAsReadable(): AssemblyInterface
    {
        $processor = new Readable(
            $this->code,
            $this->services,
            $this->postServices,
        );

        $this->code
            ->option()
            ->io()
            ->dist()
            ->write($processor->process());

        return $this;
    }

    public function saveAsBinary(): AssemblyInterface
    {
        throw new NotImplementedException('The bootloader cannot be created');
    }
}
