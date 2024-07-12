<?php
declare(strict_types=1);
namespace PHPOS;

use PHPOS\Architecture\Operation\Destination;
use PHPOS\Architecture\Operation\OperationInterface;
use PHPOS\Architecture\Operation\Source;

interface OptionInterface
{
    public function prefix(): string;
}
