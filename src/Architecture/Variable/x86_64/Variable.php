<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Variable\x86_64;

use PHPOS\Architecture\Variable\VariableCollection;
use PHPOS\Architecture\Variable\VariableInterface;
use PHPOS\Architecture\Variable\VariableType;

enum Variable implements VariableInterface
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
            ->set(VariableType::BITS_8, self::DB)
            ->set(VariableType::BITS_16, self::DW)
            ->set(VariableType::BITS_32, self::DD);
    }
}