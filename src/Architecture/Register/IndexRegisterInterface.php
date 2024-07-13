<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

interface IndexRegisterInterface
{
    public function index(): RegisterInterface;
}
