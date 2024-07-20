<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Support\Hex;

class KeyValueOption implements KeyValueOptionInterface
{
    public function __construct(protected bool $isGlobal = false, protected bool $isExtern = false)
    {

    }

    public function isGlobal(): bool
    {
        return $this->isGlobal;
    }

    public function isExtern(): bool
    {
        return $this->isExtern;
    }
}
