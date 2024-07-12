<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

interface DataRegisterInterface
{
    public function x(): RegisterInterface;
    public function high(): RegisterInterface;
    public function low(): RegisterInterface;
}