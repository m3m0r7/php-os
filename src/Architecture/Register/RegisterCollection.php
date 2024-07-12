<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

use PHPOS\Architecture\Collection\Collection;

class RegisterCollection extends Collection
{
    protected string $className = StorableRegister::class;

    public function set(RegisterType $registerType, StorableRegister $storableRegister): self
    {
        $this->items[$registerType->name] = $storableRegister;
        return $this;
    }

    public function get(RegisterType $registerType): DataRegisterInterface|IndexRegisterInterface
    {
        return $this->items[$registerType->name];
    }
}