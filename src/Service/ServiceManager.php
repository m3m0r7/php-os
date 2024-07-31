<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\OS\CodeInterface;
use PHPOS\Service\ServiceManager\ServiceComponent;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class ServiceManager implements ServiceManagerInterface
{
    public function __construct(protected CodeInterface $code)
    {

    }

    public function createComponent(?ServiceInterface $parent = null): ServiceComponentInterface
    {
        return new ServiceComponent(
            $this,
            $this->code,
            $parent,
        );
    }
}
