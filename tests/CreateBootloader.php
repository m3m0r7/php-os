<?php

declare(strict_types=1);

namespace PHPOS\Test;

use PHPOS\Architecture\ArchitectureType;
use PHPOS\Stream\Memory;

trait CreateBootloader
{
    protected Memory $result;
    protected string $route = __DIR__;

    public function setUp(): void
    {
        $this->result = new Memory();
    }

    public static function architectures(): array
    {
        $createBootloader = fn (ArchitectureType $architectureType) => new \PHPOS\Bootloader\Bootloader(
            new \PHPOS\Architecture\Architecture(
                $architectureType,
            ),
            new \PHPOS\Bootloader\Option(
                new \PHPOS\Bootloader\IO(),
            ),
        );
        return [
            [$createBootloader(ArchitectureType::x86_64)],
        ];
    }
}
