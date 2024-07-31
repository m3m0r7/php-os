<?php

declare(strict_types=1);

namespace PHPOS\Service\ServiceManager;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager;

class ServiceComponent implements ServiceComponentInterface
{
    protected array $registeredLabels = [];

    public function __construct(protected ServiceManager $serviceManager, protected CodeInterface $code, protected ?ServiceInterface $parent = null)
    {
    }

    public function createIndependencyService(string $serviceName, mixed ...$parameters): ServiceInterface
    {
        return $this->renameLabel(new $serviceName($this->code, null, ...$parameters));
    }

    public function createService(string $serviceName, mixed ...$parameters): ServiceInterface
    {
        return $this->renameLabel(new $serviceName($this->code, $this->parent, ...$parameters));
    }

    public function createServiceWithParent(string $serviceName, ServiceInterface $parent, mixed ...$parameters): ServiceInterface
    {
        return $this->renameLabel(new $serviceName($this->code, $parent, ...$parameters));
    }

    private function renameLabel(ServiceInterface $service): ServiceInterface
    {
        $labelCounter = $this->registeredLabels[$service->label()] = array_key_exists($service->label(), $this->registeredLabels)
            ? ++$this->registeredLabels[$service->label()]
            : 0;

        if ($labelCounter > 0) {
            $service->setLabel(
                $service->label() . $labelCounter
            );

        }

        return $service;
    }
}
