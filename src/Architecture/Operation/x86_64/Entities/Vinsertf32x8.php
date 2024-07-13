<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Operation\x86_64\Entities;

use PHPOS\Architecture\Operation\GeneralOperation;
use PHPOS\Architecture\Operation\EntityInterface;
use PHPOS\Exception\NotImplementedException;

class Vinsertf32x8 implements EntityInterface
{
    use GeneralOperation;

    public function name(): string
    {
        return "vinsertf32x8";
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