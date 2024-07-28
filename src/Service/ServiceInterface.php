<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\OS\InstructionInterface;
use PHPOS\Service\Component\Extern;

interface ServiceInterface
{
    public function process(): InstructionInterface;

    public function extern(): Extern;

    public function label(): string;
}
