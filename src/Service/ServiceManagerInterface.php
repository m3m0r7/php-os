<?php

declare(strict_types=1);

namespace PHPOS\Service;

interface ServiceManagerInterface
{
    public function createService(string $serviceName, mixed ...$parameters): ServiceInterface;
    public function createServiceWithParent(string $serviceName, ServiceInterface $parent, mixed ...$parameters): ServiceInterface;
}
