<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

interface KeyValueOptionInterface
{
    public function isGlobal(): bool;
    public function isExtern(): bool;
    public function aliasName(): ?string;
}
