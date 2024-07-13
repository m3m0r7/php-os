<?php
declare(strict_types=1);
namespace PHPOS\Runtime;

interface VariableDefinitionInterface extends \Stringable
{
    public function name(): string;
    public function value(): string;
}
