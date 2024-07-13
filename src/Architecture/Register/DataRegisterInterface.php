<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

interface DataRegisterInterface
{
    public function value(): RegisterInterface;
}