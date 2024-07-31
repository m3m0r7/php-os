<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Disk;

use PHPOS\Architecture\Support\Hex;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\VESABIOSExtension\VESA;
use PHPOS\Service\Component\Image\Image;
use PHPOS\Service\Component\Variable;
use PHPOS\Service\Component\VESA\VideoBitType;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class EmbedImage implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        [$image] = $this->parameters + [
            null,
        ];

        assert($image instanceof Image);
        [, , $bitType] = $this->code
            ->architecture()
            ->runtime()
            ->style()
            ->screen()
            ->resolutions();
        assert($bitType instanceof VideoBitType);

        Variable::createWithNameBy(
            $this->code,
            $this->label() . '_image',
            array_chunk($image->as8BitsRGBAList(), ($bitType->value / 8) * 16),
        );

        return new Instruction($this->code, $serviceComponent);
    }
}
