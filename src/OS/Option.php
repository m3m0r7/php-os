<?php

declare(strict_types=1);

namespace PHPOS\OS;

class Option implements OptionInterface
{
    public function __construct(
        protected IOInterface $io = new \PHPOS\OS\IO(),
    ) {

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
