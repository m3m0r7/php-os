<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation\x86_64\Entity;

use PHPOS\Architecture\Operation\GeneralOperation;
use PHPOS\Architecture\Operation\EntityInterface;
use PHPOS\Exception\NotImplementedException;

class Cvttpd2pi implements EntityInterface
{
    use GeneralOperation;

    public function name(): string
    {
        return "cvttpd2pi";
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
