<?php

declare(strict_types=1);
namespace PHPOS\Stream;

interface StreamReaderInterface
{
    public function read(int $bytes): string;
    public function tell(): int;
}