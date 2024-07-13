<?php

declare(strict_types=1);

namespace PHPOS\Bootloader;

use PHPOS\Stream\StreamReaderInterface;
use PHPOS\Stream\StreamWriterInterface;

interface IOInterface
{
    public function stdIn(): StreamReaderInterface;
    public function stdOut(): StreamWriterInterface;
    public function stdErr(): StreamWriterInterface;
}
