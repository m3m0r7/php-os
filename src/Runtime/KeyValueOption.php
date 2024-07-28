<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Support\Hex;

class KeyValueOption implements KeyValueOptionInterface
{
    public function __construct(protected ?string $aliasName = null)
    {

    }

    public function aliasName(): ?string
    {
        return $this->aliasName;
    }
}
