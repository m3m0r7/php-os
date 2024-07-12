<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Register;

enum x86_64 implements RegisterInterface
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
            ->set(RegisterType::DESTINATION_INDEX, new IndexRegister(self::EDI));
    }

    public function realName(): string
    {
        return strtolower($this->name);
    }
}