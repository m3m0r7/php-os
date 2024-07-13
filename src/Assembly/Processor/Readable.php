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
        foreach ($this->initializationServices as $service) {
            $service = new $service($this->bootloader);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        foreach ($this->bootloader->architecture()->runtime()->definedVariables() as $name => $value) {
            $assembly .= (new Variable(
                $this->bootloader,
                null,
                $name,
                $value,
            ))->process()->assemble() . "\n";
        }

        foreach ($this->postServices as $service) {
            $service = new $service($this->bootloader);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        return $assembly;
    }
}