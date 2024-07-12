<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Architecture\Variable\VariableCollection;

class Runtime implements RuntimeInterface
{
    public function __construct(
        protected RegisterCollection $registers,
        protected VariableCollection $variables,
    )
    {
    }

    public function registers(): RegisterCollection
    {
        return $this->registers;
    }

    public function variables(): VariableCollection
    {
        return $this->variables;
    }
}
