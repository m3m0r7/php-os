<?php

declare(strict_types=1);

namespace PHPOS\Test;

use PHPOS\Architecture\ArchitectureType;
use PHPOS\Stream\Memory;

trait CreateCode
{
    protected Memory $result;

    public function setUp(): void
    {
        $this->result = new Memory();
    }

    public static function architectures(): array
    {
        $createBootloader = fn (ArchitectureType $architectureType) => new \PHPOS\OS\Code(
            new \PHPOS\Architecture\Architecture(
                $architectureType,
            ),
            new \PHPOS\OS\Option(
                new \PHPOS\OS\IO(),
            ),
        );
        return [
            [$createBootloader(ArchitectureType::x86_64)],
        ];
    }
}
