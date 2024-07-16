<?php

declare(strict_types=1);

namespace PHPOS\Test;

use PHPOS\Architecture\ArchitectureType;
use PHPOS\Stream\Memory;

trait CreateCode
{
    public function setUp(): void
    {
    }

    public static function architectures(): array
    {
        $createBootloader = fn (ArchitectureType $architectureType) => new \PHPOS\OS\Code(
            new \PHPOS\Architecture\Architecture(
                $architectureType,
            ),
        );
        return [
            [$createBootloader(ArchitectureType::x86_64)],
        ];
    }
}
