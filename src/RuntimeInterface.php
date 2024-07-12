<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Architecture\Variable\VariableCollection;

interface RuntimeInterface
{
    public function registers(): RegisterCollection;
    public function variables(): VariableCollection;
}
