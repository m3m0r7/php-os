<?php

declare(strict_types=1);

namespace PHPOS\Assembly\Processor;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\Variable;

class Readable implements ProcessorInterface
{
    public function __construct(protected BootloaderInterface $bootloader, protected array $initializationServices = [], protected array $postServices = [])
    {
    }

    public function process(): string
    {
        $assembly = '';
        foreach ($this->initializationServices as [$service, $parameters]) {
            $service = new $service($this->bootloader, null, ...$parameters);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        foreach ($this->bootloader->architecture()->runtime()->definedVariables() as $value) {
            $assembly .= (new Variable(
                $this->bootloader,
                null,
                $value,
            ))->process()->assemble() . "\n";
        }

        foreach ($this->postServices as [$service, $parameters]) {
            $service = new $service($this->bootloader, null, ...$parameters);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        return $assembly;
    }
}
