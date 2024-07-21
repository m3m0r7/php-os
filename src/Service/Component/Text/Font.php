<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\Text;

use PHPOS\Service\Component\Image\Pixelable;
use PHPOS\Service\Component\Image\RGBA;

class Font implements FontInterface
{
    use Pixelable;

    protected \Imagick $imagick;
    private int $XResolution;
    private int $YResolution;

    public function __construct(protected string $text, protected string $fontPath, protected int $fontSize, protected RGBA $fontColor = new RGBA(0x00, 0x00, 0x00), protected RGBA $backgroundColor = new RGBA(0xff, 0xff, 0xff))
    {
        $this->imagick = new \Imagick();
        $draw = new \ImagickDraw();
        $backgroundColor = new \ImagickPixel($this->backgroundColor->asColorCode());
        $fontColor = new \ImagickPixel($this->fontColor->asColorCode());

        $draw->setFillColor($fontColor);

        $draw->setFont($this->fontPath);
        $draw->setFontSize($fontSize);

        ['textWidth' => $textWidth, 'textHeight' => $textHeight, 'descender' => $descender, 'ascender' => $ascender] = $metrics = $this->imagick->queryFontMetrics($draw, $text);

        /* 画像を作成します */
        $this->imagick->newImage((int) $textWidth, (int) $textHeight, $backgroundColor);

        /* テキストの作成 */
        $this->imagick->annotateImage($draw, 0, (int) ((((int) $textHeight) + $ascender + $descender) / 2),  0, $text);

        /* 画像形式の設定 */
        $this->imagick->setImageFormat('png');

        $this->XResolution = (int) $this->imagick->getImageWidth();
        $this->YResolution = (int) $this->imagick->getImageHeight();
    }

    public function path(): ?string
    {
        return '';
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
}
