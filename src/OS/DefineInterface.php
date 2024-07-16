<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\OS\Bundler\ReplaceMarker;

interface DefineInterface extends \Stringable
{
    public function name(): string;
    public function value(): string|int|null;
    public function valueOf(): string|ReplaceMarker|int|null;
}
