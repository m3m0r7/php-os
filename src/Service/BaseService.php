<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\Component\Extern;
use PHPOS\Service\Component\Formatter;

trait BaseService
{
    protected Extern $extern;
    protected array $parameters = [];
    protected ?string $label = null;
    protected ?string $labelSuffix = null;

    public function __construct(protected CodeInterface $code, protected ?ServiceInterface $parent = null, ...$parameters)
    {
        $this->extern = new Extern();
        $this->parameters = $parameters;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function setLabelSuffix(string $suffix): self
    {
        $this->labelSuffix = $suffix;
        return $this;
    }

    public function extern(): Extern
    {
        return $this->extern;
    }

    public function label(): string
    {
        if ($this->label) {
            return $this->label;
        }
        $reflection = new \ReflectionClass($this);

        // NOTE Split with @ because this is border to anonymous class in PHP
        [$className, $anonymousPath] = explode('@', get_class($this)) + [null, null];
        if ($reflection->isAnonymous()) {

            // Separate class name and anonymous path
            $className .= '__anonymous_' . explode(':', basename($anonymousPath))[0];
        }

        $name = Formatter::removeSign($className . ($this->labelSuffix ? '_' . $this->labelSuffix : ''));

        if ($this->parent !== null) {
            return $this->parent->label() . '_' . $name;
        }
        return $this->code->option()->prefix() . $name;
    }
}
