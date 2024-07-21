<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Image;

use PHPOS\OS\CodeInterface;

class Image implements ImageInterface
{
    protected \Imagick $imagick;
    private int $XResolution;
    private int $YResolution;

    public function __construct(protected string $path)
    {
        $this->imagick = new \Imagick($this->path);

        $this->XResolution = (int) $this->imagick->getImageWidth();
        $this->YResolution = (int) $this->imagick->getImageHeight();
    }

    public function path(): string
    {
        return $this->path;
    }

    public function width(): int
    {
        return $this->XResolution;
    }

    public function height(): int
    {
        return $this->YResolution;
    }

    public function size24Bits(): int
    {
        return $this->width() * $this->height() * 3;
    }

    /**
     * @return RGBA[]
     */
    public function as8BitsRGBAList(): array
    {
        $list = [];
        for ($y = 0; $y < $this->YResolution; $y++) {
            for ($x = 0; $x < $this->XResolution; $x++) {
                ['r' => $r, 'g' => $g, 'b' => $b, 'a' => $a] = $this
                    ->imagick
                    ->getImagePixelColor($x, $y)
                    ->getColor();

                [$r, $g, $b] = (new RGBA((int) $r, (int) $g, (int) $b, (int) $a))
                    ->as24Bits();
                $list[] = $r;
                $list[] = $g;
                $list[] = $b;
            }
        }

        return $list;
    }
}
