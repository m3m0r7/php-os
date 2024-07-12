<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Variable;

class Variable
{
    public function __construct(public readonly VariableInterface $variable)
    {

    }
}