<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Service\ServiceManager\ServiceComponentInterface;

interface ServiceManagerInterface
{
    public function createComponent(?ServiceInterface $parent = null): ServiceComponentInterface;
}
