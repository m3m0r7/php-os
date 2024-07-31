<?php

declare(strict_types=1);

namespace PHPOS\Service\ServiceManager;

use PHPOS\Service\ServiceInterface;

interface ServiceComponentInterface
{
    public function createIndependencyService(string $serviceName, mixed ...$parameters): ServiceInterface;
    public function createService(string $serviceName, mixed ...$parameters): ServiceInterface;
    public function createServiceWithParent(string $serviceName, ServiceInterface $parent, mixed ...$parameters): ServiceInterface;
}
