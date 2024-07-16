<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

use PHPOS\Collection\Collection;
use PHPOS\Exception\PHPOSException;

class RegisterCollection extends Collection
{
    protected string $className = StorableRegister::class;

    public function set(RegisterType $registerType, StorableRegister $storableRegister): self
    {
        $this->items[$registerType->name] = $storableRegister;
        return $this;
    }

    public function get(RegisterType $registerType): DataRegisterInterface|SegmentRegisterInterface|IndexRegisterInterface|StackPointerRegisterInterface
    {
        return $this->items[$registerType->name] ?? throw new PHPOSException(sprintf('The PHP-OS was not registered %s', $registerType->name));
    }
}
