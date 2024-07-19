<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\VESABIOSExtension\Renderer;

use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Operation\Mov;
use PHPOS\OS\ImageCodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\Disk\LoadSector;
use PHPOS\Service\ServiceInterface;

class RenderImageFromDisk implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        [$image] = $this->parameters + [null];
        assert($image instanceof ImageCodeInterface);

        $registers = $this->code->architecture()->runtime()->registers();

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_32);
        assert($si instanceof IndexRegisterInterface);

        return (new Instruction($this->code))
            ->label(
                $this->label(),
                fn (InstructionInterface $instruction) => $instruction
                    ->include(new LoadSector(
                        $this->code,
                        $this,
                        $image,
                    ))
                    ->append(Mov::class, $si->index(), $image->origin())
                    ->include(new RenderImage(
                        $this->code,
                        $this,
                        $image->width(),
                        $image->height(),
                    )),
            );
    }
}
