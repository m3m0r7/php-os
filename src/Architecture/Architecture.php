<?php
declare(strict_types=1);
namespace PHPOS\Architecture;

use PHPOS\Architecture\Register\RegisterCollection;
use PHPOS\Exception\RuntimeNotRegisteredException;
use PHPOS\Runtime;
use PHPOS\RuntimeInterface;

class Architecture implements ArchitectureInterface
{
    protected array $architectures = [];

    public function __construct(public readonly ArchitectureType $useArchitectureType)
    {
        $this->registerArchitecture(
            ArchitectureType::x86_84,
            new Runtime(
                \PHPOS\Architecture\Register\x86_64::registers(),
                \PHPOS\Architecture\Variable\x86_64::variables(),
            )
        );
    }

    public function registerArchitecture(ArchitectureType $architectureType, Runtime $registers): self
    {
        $this->architectures[$architectureType->name] = $registers;
        return $this;
    }

    public function runtime(): RuntimeInterface
    {
        return $this->architectures[$this->useArchitectureType->name] ?? throw new RuntimeNotRegisteredException('The kernel not registered');
    }
}