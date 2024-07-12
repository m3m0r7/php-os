<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Variable;

interface VariableInterface
{
    public static function variables(): VariableCollection;
    public function realName(): string;
}