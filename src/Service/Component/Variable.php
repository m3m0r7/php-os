<?php

declare(strict_types=1);

namespace PHPOS\Service\Component;

use PHPOS\OS\CodeInterface;
use PHPOS\Runtime\KeyValueInterface;

class Variable
{
    protected KeyValueInterface $variable;

    public function __construct(protected CodeInterface $code, string $string)
    {
        $this->variable = $this->code
            ->architecture()
            ->runtime()
            ->setVariable(
                sprintf($this->code->option()->prefix() . 'var_%s', Formatter::removeSign(base64_encode($string))),
                $string,
            );
    }

    public static function createBy(CodeInterface $code, string $string): KeyValueInterface
    {
        return (new self($code, $string))
            ->variable;
    }
}
