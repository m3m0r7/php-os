<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\OS\InstructionInterface;
use PHPOS\Service\Component\Extern;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

interface ServiceInterface
{
    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface;

    public function extern(): Extern;

    public function label(): string;
    public function setLabel(string $label): ServiceInterface;
}
