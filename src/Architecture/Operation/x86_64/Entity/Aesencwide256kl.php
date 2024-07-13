<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation\x86_64\Entity;

use PHPOS\Architecture\Operation\GeneralOperation;
use PHPOS\Architecture\Operation\EntityInterface;
use PHPOS\Exception\NotImplementedException;

class Aesencwide256kl implements EntityInterface
{
    use GeneralOperation;

    public function name(): string
    {
        return "aesencwide256kl";
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
