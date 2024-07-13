<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation\x86_64\Entity;

use PHPOS\Architecture\Operation\GeneralOperation;
use PHPOS\Architecture\Operation\EntityInterface;
use PHPOS\Exception\NotImplementedException;

class Sha1msg2 implements EntityInterface
{
    use GeneralOperation;

    public function name(): string
    {
        return "sha1msg2";
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