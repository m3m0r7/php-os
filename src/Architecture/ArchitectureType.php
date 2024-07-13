<?php
declare(strict_types=1);
namespace PHPOS\Architecture;

use PHPOS\Architecture\Register\RegisterInterface;

enum ArchitectureType
{
    case x86_64;
    case i386;
    case aarch64;
}
