<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\OS\InstructionInterface;
use PHPOS\Service\Component\Extern;

interface ServiceInterface
{
    public function process(ServiceManagerInterface $serviceManager): InstructionInterface;

    public function extern(): Extern;

    public function label(): string;
    public function setLabel(string $label): ServiceInterface;
}
