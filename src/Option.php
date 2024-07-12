<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Operation\Destination;
use PHPOS\Architecture\Operation\OperationInterface;
use PHPOS\Architecture\Operation\Source;

class Option implements OptionInterface
{
    public function prefix(): string
    {
        return '__php_';
    }
}
