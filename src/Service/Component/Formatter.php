<?php

declare(strict_types=1);

namespace PHPOS\Service\Component;

use PHPOS\OS\CodeInterface;

class Formatter
{
    public static function removeSign(string $name): string
    {
        return preg_replace(
            '/[!@#$%^&*()_+|.><?.,\-=\\\\\/:]/',
            '_',
            $name,
        );
    }
}
