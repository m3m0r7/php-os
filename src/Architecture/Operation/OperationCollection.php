<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation;

use PHPOS\Collection\Collection;
use PHPOS\Exception\InvalidMnemonicException;

class OperationCollection extends Collection
{
    protected string $className = MnemonicInterface::class;

    public function bind(OperationType $operationType, MnemonicInterface $mnemonic): self
    {
        if (!enum_exists($mnemonic::class, false)) {
            throw new InvalidMnemonicException(
                'The mnemonic class is not made by an enum'
            );
        }

        $this->items[$operationType->name] = $mnemonic;
        return $this;
    }

    public function get(OperationType $registerType): string
    {
        return $this->items[$registerType->name]->value;
    }
}
