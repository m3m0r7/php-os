<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Variable;

enum x86_64 implements VariableInterface
{
    case DB;
    case DW;
    case DD;

    public function realName(): string
    {
        return strtolower($this->name);
    }

    public static function variables(): VariableCollection
    {
        return (new VariableCollection())
            ->set(VariableType::BITS_8, new Variable(self::DB))
            ->set(VariableType::BITS_16, new Variable(self::DW))
            ->set(VariableType::BITS_32, new Variable(self::DD));
    }
}