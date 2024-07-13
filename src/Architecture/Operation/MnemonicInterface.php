<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation;

interface MnemonicInterface
{
    public static function operations(): OperationCollection;
    public function realName(): string;
}
