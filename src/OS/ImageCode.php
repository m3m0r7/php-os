<?php

declare(strict_types=1);

namespace PHPOS\OS;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Service\BIOS\Disk\CodeSignature;
use PHPOS\Service\BIOS\Disk\EmbedImage;
use PHPOS\Service\Component\Image\Image;

class ImageCode extends Code implements ImageCodeInterface
{
    public function __construct(protected Image $image, protected ArchitectureInterface $architecture, protected OptionInterface $option = new Option())
    {
        parent::__construct($this->architecture, $this->option);

        $this->setSectors((int) ceil($image->size24Bits() / OSInfo::PAGE_SIZE))
            ->registerService(EmbedImage::class, $this->image);
    }

    public function width(): int
    {
        return $this->image->width();
    }

    public function height(): int
    {
        return $this->image->height();
    }

    public function name(): DefineInterface
    {
        return new Define(
            $this->createName(__FUNCTION__),
            $this->createCodeName(),
        );
    }

    protected function createCodeName(): string
    {
        return $this->name ?: 'image_code_' . spl_object_hash($this);
    }
}
