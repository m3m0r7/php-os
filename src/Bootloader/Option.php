<?php
declare(strict_types=1);
namespace PHPOS\Bootloader;

class Option implements OptionInterface
{
    public function prefix(): string
    {
        return '__php_';
    }
}
