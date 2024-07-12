<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Variable;

enum VariableType
{
    case BITS_8;
    case BITS_16;
    case BITS_32;
}