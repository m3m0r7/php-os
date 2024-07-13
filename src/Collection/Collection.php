<?php

declare(strict_types=1);

namespace PHPOS\Collection;

use PHPOS\Exception\CollectionCannotGetException;
use PHPOS\Exception\CollectionCannotSetException;

abstract class Collection implements \ArrayAccess
{
    protected string $className;

    protected array $items = [];

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->items);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->items[$offset] ?? throw new CollectionCannotGetException("The collection did not set value with {$offset}");
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!($value instanceof $this->className)) {
            throw new CollectionCannotSetException('The value is not implemented ' . $this->className);
        }

        $this->items[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
        $this->items = array_values($this->items);
    }
}
