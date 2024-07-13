<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation\x86_64\Entities;

use PHPOS\Architecture\Operation\GeneralOperation;
use PHPOS\Architecture\Operation\EntityInterface;
use PHPOS\Exception\NotImplementedException;

class Vrcp14ss implements EntityInterface
{
    use GeneralOperation;

    public function name(): string
    {
        return "vrcp14ss";
    }

    public function opcode(): int
    {
        throw new NotImplementedException(
            sprintf(
                "The `%s` opcode did not implemented yet",
                $this->name(),
            ),
        );
    }
}
