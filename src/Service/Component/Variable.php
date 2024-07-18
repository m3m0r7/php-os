<?php

declare(strict_types=1);

namespace PHPOS\Service\Component;

use PHPOS\OS\CodeInterface;
use PHPOS\Runtime\KeyValueInterface;

class Variable
{
    protected KeyValueInterface $variable;

    public function __construct(protected CodeInterface $code, string|array $value, string $name = null)
    {
        $this->variable = $this->code
            ->architecture()
            ->runtime()
            ->setVariable(
                sprintf($this->code->option()->prefix() . 'var_%s', Formatter::removeSign($name ?? base64_encode($value))),
                $value,
            );
    }

    public static function createBy(CodeInterface $code, string|array $value): KeyValueInterface
    {
        return (new self($code, $value))
            ->variable;
    }

    public static function createWithNameBy(CodeInterface $code, string $name, string|array $value): KeyValueInterface
    {
        return (new self($code, $value, $name))
            ->variable;
    }
}
