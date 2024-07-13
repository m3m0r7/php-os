<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

interface RegisterInterface
{
    public static function registers(): RegisterCollection;
    public function realName(): string;
}
