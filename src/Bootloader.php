<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Service\EndOfBootLoader;
use PHPOS\Service\PrintCharacter;
use PHPOS\Service\PrintString;
use PHPOS\Service\Return_;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\Start;

class Bootloader implements BootloaderInterface
{
    protected array $services = [];
    public function __construct(public readonly ArchitectureInterface $architecture, protected readonly OptionInterface $option) {

    }

    public function architecture(): ArchitectureInterface
    {
        return $this->architecture;
    }

    public function option(): OptionInterface
    {
        return $this->option;
    }

    public function registerService(string $serviceName): self
    {
        $this->services[] = $serviceName;
        return $this;
    }

    public function initialize(): self
    {
        $this->registerService(Start::class);
        $this->registerService(PrintString::class);

        // NOTE: Should be end
        $this->registerService(EndOfBootLoader::class);

        return $this;
    }

    public function assembly(): self
    {
        $assembly = '';
        foreach ($this->services as $service) {
            $service = new $service($this);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        echo $assembly;

        return $this;
    }
}