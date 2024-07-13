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
        $reflection = new \ReflectionClass($this);

        // NOTE Split with @ because this is border to anonymous class in PHP
        [$className, $anonymousPath] = explode('@', get_class($this)) + [null, null];
        if ($reflection->isAnonymous()) {

            // Separate class name and anonymous path
            $className .= '__anonymous_' . explode(':', basename($anonymousPath))[0];
        }

        $name = $this->formatClassName($className);

        if ($this->parent !== null) {
            return $this->parent->label() . '_' . $name;
        }
        return $this->bootloader->option()->prefix() . $name;
    }

    private function formatClassName($name): string
    {
        return preg_replace(
            '/[!@#$%^&*()_+|.><?.,\-=\\\\\/:]/',
            '_',
            $name,
        );
    }
}
