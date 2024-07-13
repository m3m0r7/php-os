<?php

declare(strict_types=1);

namespace PHPOS\Runtime;

use PHPOS\Architecture\Support\Hex;

interface VariableDefinitionInterface extends \Stringable
{
    public function name(): string;
    public function value(): string|Hex|int;
}
