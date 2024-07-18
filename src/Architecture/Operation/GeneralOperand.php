<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation;

use PHPOS\Architecture\Register\RegisterInterface;
use PHPOS\Exception\OperandCannotConvertException;
use PHPOS\OS\DefineInterface;
use PHPOS\Service\ServiceInterface;

trait GeneralOperand
{
    public function __construct(protected mixed $valueOf)
    {
    }

    public function __toString(): string
    {
        if ($this->valueOf === null) {
            return '';
        }
        if ($this->valueOf instanceof RegisterInterface) {
            return $this->valueOf->realName();
        }
        if ($this->valueOf instanceof ServiceInterface) {
            return $this->valueOf->label();
        }
        // NOTE: A float value is forcibly converted
        if (is_float($this->valueOf)) {
            $this->valueOf = (int) $this->valueOf;
        }
        if (is_int($this->valueOf)) {
            return "{$this->valueOf}";
        }
        if ($this->valueOf instanceof DefineInterface) {
            return "{$this->valueOf->name()}";
        }

        if ($this->valueOf instanceof \Stringable || is_string($this->valueOf)) {
            return "{$this->valueOf}";
        }

        throw new OperandCannotConvertException('The operand cannot convert to string');
    }
}
