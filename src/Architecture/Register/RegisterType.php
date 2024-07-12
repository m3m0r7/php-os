<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

enum RegisterType
{
    case ACCUMULATOR;
    case BASE;
    case COUNTER;
    case DATA;

    case SOURCE_INDEX;
    case DESTINATION_INDEX;

    case BASE_POINTER;
    case STACK_POINTER;
    case INSTRUCTION_POINTER;
}