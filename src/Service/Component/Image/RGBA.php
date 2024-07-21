<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Image;

use PHPOS\Service\Component\VESA\VideoBitType;

class RGBA implements \Stringable
{
    public function __construct(protected int $r, protected int $g, protected int $b, protected int $a = 0xFF)
    {
    }

    public static function fromColorCode(int $colorCode): self
    {
        $r = ($colorCode >> 16) & 0xff;
        $g = ($colorCode >> 8) & 0xff;
        $b = $colorCode & 0xff;
        return new RGBA(
            $r,
            $g,
            $b,
        );
    }

    public function as24BitsHex(): string
    {
        return sprintf(
            '0x%02X%02X%02X',
            $this->r,
            $this->g,
            $this->b,
        );
    }

    public function asHexByVideoType(VideoBitType $bitType): string
    {
        return match ($bitType) {
            VideoBitType::BITS_24 => $this->as24BitsHex(),
        };
    }

    public function as24Bits(): array
    {
        return [
            $this->r,
            $this->g,
            $this->b,
        ];
    }

    public function __toString(): string
    {
        return sprintf(
            '0x%02X%02X%02X%02X',
            $this->r,
            $this->g,
            $this->b,
            $this->a,
        );
    }

    public function asColorCode(): string
    {
        return sprintf(
            '#%02X%02X%02X',
            $this->r,
            $this->g,
            $this->b,
        );
    }
}
