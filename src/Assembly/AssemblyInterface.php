<?php

declare(strict_types=1);

namespace PHPOS\Assembly;

use PHPOS\Stream\StreamWriterInterface;

interface AssemblyInterface
{
    public function saveAsReadable(): AssemblyInterface;
    public function saveAsBinary(): AssemblyInterface;
}
