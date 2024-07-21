<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Image;

use PHPOS\OS\CodeInterface;

trait Pixelable
{
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
                $list[] = $b;
                $list[] = $g;
                $list[] = $r;
            }
        }

        return $list;
    }
}
