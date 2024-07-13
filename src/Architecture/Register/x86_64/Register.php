<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register\x86_64;

use PHPOS\Architecture\Register\DataRegister16Bits;
use PHPOS\Architecture\Register\DataRegister32Bits;
use PHPOS\Architecture\Register\DataRegister64Bits;
use PHPOS\Architecture\Register\IndexRegister16Bits;
use PHPOS\Architecture\Register\IndexRegister32Bits;
use PHPOS\Architecture\Register\IndexRegister64Bits;
use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Architecture\Register\RegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Register\SegmentRegister;

enum Register implements RegisterInterface
{
    case RAX;
    case EAX;
    case AX;
    case AH;
    case AL;

    case RCX;
    case ECX;
    case CX;
    case CH;
    case CL;

    case EDX;
    case DX;
    case DH;
    case DL;

    case RBX;
    case EBX;
    case BX;
    case BH;
    case BL;

    case RSI;
    case ESI;
    case SI;
    case SIL;

    case RDI;
    case EDI;
    case DI;
    case DIL;

    case EBP;
    case ESP;
    case EIP;

    case EFLAGS;

    case CS;
    case DS;
    case SS;
    case ES;
    case FS;
    case GS;

    public static function registers(): RegisterCollection
    {
        return (new RegisterCollection())
            ->set(RegisterType::ACCUMULATOR_BITS_16, new DataRegister16Bits(self::AX, self::AH, self::AL))
            ->set(RegisterType::ACCUMULATOR_BITS_32, new DataRegister32Bits(self::EAX))
            ->set(RegisterType::ACCUMULATOR_BITS_64, new DataRegister64Bits(self::RAX))
            ->set(RegisterType::COUNTER_BITS_16, new DataRegister16Bits(self::CX, self::CH, self::CL))
            ->set(RegisterType::COUNTER_BITS_32, new DataRegister32Bits(self::ECX))
            ->set(RegisterType::COUNTER_BITS_64, new DataRegister64Bits(self::RCX))
            ->set(RegisterType::BASE_BITS_16, new DataRegister16Bits(self::BX, self::BH, self::BL))
            ->set(RegisterType::BASE_BITS_32, new DataRegister32Bits(self::EBX))
            ->set(RegisterType::BASE_BITS_64, new DataRegister64Bits(self::RBX))
            ->set(RegisterType::SOURCE_INDEX_BITS_16, new IndexRegister16Bits(self::SI, self::SIL))
            ->set(RegisterType::SOURCE_INDEX_BITS_32, new IndexRegister32Bits(self::ESI))
            ->set(RegisterType::SOURCE_INDEX_BITS_64, new IndexRegister64Bits(self::RSI))
            ->set(RegisterType::DESTINATION_INDEX_BITS_16, new IndexRegister16Bits(self::DI, self::DIL))
            ->set(RegisterType::DESTINATION_INDEX_BITS_32, new IndexRegister32Bits(self::EDI))
            ->set(RegisterType::DESTINATION_INDEX_BITS_64, new IndexRegister64Bits(self::RDI))
            ->set(RegisterType::CODE_SEGMENT, new SegmentRegister(self::CS))
            ->set(RegisterType::DATA_SEGMENT, new SegmentRegister(self::DS))
            ->set(RegisterType::STACK_SEGMENT, new SegmentRegister(self::SS))
            ->set(RegisterType::EXTRA_SEGMENT, new SegmentRegister(self::ES));
    }

    public function realName(): string
    {
        return strtolower($this->name);
    }
}