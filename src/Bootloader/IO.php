<?php
declare(strict_types=1);
namespace PHPOS\Bootloader;

use PHPOS\Stream\StreamReaderInterface;
use PHPOS\Stream\StreamWriterInterface;

class IO implements IOInterface
{
    public function __construct(
        protected ?StreamReaderInterface $stdIn = null,
        protected ?StreamWriterInterface $stdOut = null,
        protected ?StreamWriterInterface $stdErr = null,
    )
    {
        if ($this->stdIn === null) {
            $this->stdIn = new \PHPOS\Stream\File(STDIN);
        }

        if ($this->stdOut === null) {
            $this->stdOut = new \PHPOS\Stream\File(STDOUT);
        }

        if ($this->stdErr === null) {
            $this->stdErr = new \PHPOS\Stream\File(STDERR);
        }
    }

    public function stdIn(): StreamReaderInterface
    {
        return $this->stdIn;
    }

    public function stdOut(): StreamWriterInterface
    {
        return $this->stdOut;
    }

    public function stdErr(): StreamWriterInterface
    {
        return $this->stdErr;
    }
}
