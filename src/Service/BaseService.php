<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Bootloader\BootloaderInterface;

trait BaseService
{
    protected array $parameters = [];

    public function __construct(protected BootloaderInterface $bootloader, protected ?ServiceInterface $parent = null, ...$parameters)
    {
        $this->parameters = $parameters;
    }

    public function label(): string
    {
        $name = $this->formatClassName(get_class($this));

        if ($this->parent !== null) {
            return $this->parent->label() . '_' . $name;
        }
        return $this->bootloader->option()->prefix() . $name;
    }

    private function formatClassName($name): string
    {
        return preg_replace(
            '/[!@#$%^&*()_+|.><?.,\-=\\\]/',
            '_',
            $name,
        );
    }
}
