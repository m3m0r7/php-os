<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register\x86_64;

use PHPOS\Architecture\Register\DataRegister;
use PHPOS\Architecture\Register\IndexRegister;
use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Architecture\Register\RegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Register\SegmentRegister;

enum Register implements RegisterInterface
{
    case EAX;
    case EAH;
    case EAL;

    case ECX;
    case ECH;
    case ECL;

    case EDX;
    case EDH;
    case EDL;

    case EBX;
    case EBH;
    case EBL;

    case ESI;
    case EDI;

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
            ->set(RegisterType::ACCUMULATOR, new DataRegister(self::EAX, self::EAH, self::EAL))
            ->set(RegisterType::COUNTER, new DataRegister(self::ECX, self::ECH, self::ECL))
            ->set(RegisterType::BASE, new DataRegister(self::EBX, self::EBH, self::EBL))
            ->set(RegisterType::SOURCE_INDEX, new IndexRegister(self::ESI))
            ->set(RegisterType::DESTINATION_INDEX, new IndexRegister(self::EDI))
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