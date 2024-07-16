<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Register;

enum RegisterType
{
    case ACCUMULATOR_BITS_16;
    case ACCUMULATOR_BITS_32;
    case ACCUMULATOR_BITS_64;

    case BASE_BITS_16;
    case BASE_BITS_32;
    case BASE_BITS_64;

    case COUNTER_BITS_16;
    case COUNTER_BITS_32;
    case COUNTER_BITS_64;

    case DATA_BITS_16;
    case DATA_BITS_32;
    case DATA_BITS_64;

    case SOURCE_INDEX_BITS_16;
    case SOURCE_INDEX_BITS_32;
    case SOURCE_INDEX_BITS_64;

    case DESTINATION_INDEX_BITS_16;
    case DESTINATION_INDEX_BITS_32;
    case DESTINATION_INDEX_BITS_64;

    case BASE_POINTER_BITS_16;
    case BASE_POINTER_BITS_32;
    case STACK_POINTER_BITS_16;
    case STACK_POINTER_BITS_32;
    case INSTRUCTION_POINTER_BITS_16;
    case INSTRUCTION_POINTER_BITS_32;

    case CODE_SEGMENT;
    case DATA_SEGMENT;
    case EXTRA_SEGMENT;
    case STACK_SEGMENT;
}
