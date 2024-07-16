<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Support\Hex;

interface KeyValueInterface extends \Stringable
{
    public function name(): string;
    public function value(): string|Hex|int|null;
}