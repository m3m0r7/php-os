<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Bootloader\InstructionInterface;

interface ServiceInterface
{
    public function process(): InstructionInterface;

    public function label(): string;
}
