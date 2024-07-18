<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Image;

use PHPOS\OS\CodeInterface;

interface ImageInterface
{
    public function path(): string;
    /**
     * @return RGBA[]
     */
    public function as8BitsRGBAList(): array;

    public function width(): int;
    public function height(): int;
}
