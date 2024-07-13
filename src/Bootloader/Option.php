<?php
declare(strict_types=1);
namespace PHPOS\Bootloader;

use PHPOS\Stream\StreamInterface;
use PHPOS\Stream\StreamReaderInterface;
use PHPOS\Stream\StreamWriterInterface;

class Option implements OptionInterface
{
    public function __construct(
        protected IOInterface $io,
    )
    {

    }

    public function prefix(): string
    {
        return '__php_';
    }

    public function io(): IOInterface
    {
        return $this->io;
    }
}
