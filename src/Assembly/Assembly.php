<?php

declare(strict_types=1);

namespace PHPOS\Assembly;

use PHPOS\Assembly\Processor\Text;
use PHPOS\Exception\NotImplementedException;
use PHPOS\OS\CodeInterface;

class Assembly implements AssemblyInterface
{
    public function __construct(protected CodeInterface $code, protected array $services = [], protected array $postServices = [])
    {
    }

    public function asText(): string
    {
        $processor = new Text(
            $this->code,
            $this->services,
            $this->postServices,
        );

        return $processor->process();
    }

    public function asBinary(): string
    {
        throw new NotImplementedException('The bootloader cannot be created');
    }
}
