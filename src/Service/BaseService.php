<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\BootloaderInterface;
use PHPOS\InstructionInterface;

trait BaseService
{
    public function label(): string
    {
        return $this->bootloader->option()->prefix() . preg_replace(
            '/[!@#$%^&*()_+|.><?.,\-=\\\]/',
            '_',
            get_class($this),
        );
    }
}
