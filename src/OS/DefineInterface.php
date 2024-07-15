<?php

declare(strict_types=1);

namespace PHPOS\OS;

interface DefineInterface extends \Stringable
{
    public function name(): string;
    public function value(): string|int|null;
}
