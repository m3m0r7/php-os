<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\ArchitectureInterface;
use PHPOS\Service\EndOfBootLoader;
use PHPOS\Service\HelloWorld;
use PHPOS\Service\PrintString;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\Start;
use PHPOS\Service\Variable;

class Bootloader implements BootloaderInterface
{
    protected array $initializeServices = [];
    protected array $postServices = [];
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

    public function registerInitializeService(string $serviceName): self
    {
        $this->initializeServices[] = $serviceName;
        return $this;
    }

    public function registerPostService(string $serviceName): self
    {
        $this->postServices[] = $serviceName;
        return $this;
    }

    public function registerInitializeServices(): self
    {
        $this->registerInitializeService(Start::class);
        $this->registerInitializeService(HelloWorld::class);
        $this->registerInitializeService(PrintString::class);

        return $this;
    }

    public function registerPostServices(): self
    {
        $this->registerPostService(EndOfBootLoader::class);

        return $this;
    }

    public function assemble(): self
    {
        $assembly = '';
        foreach ($this->initializeServices as $service) {
            $service = new $service($this);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        foreach ($this->architecture->runtime()->definedVariables() as $name => $value) {
            $assembly .= (new Variable(
                $this,
                null,
                $name,
                $value,
            ))->process()->assemble() . "\n";
        }

        foreach ($this->postServices as $service) {
            $service = new $service($this);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        echo $assembly;

        return $this;
    }
}