<?php
declare(strict_types=1);
namespace PHPOS\Architecture;

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
                $this,
                \PHPOS\Architecture\Register\x86_64\Register::registers(),
                \PHPOS\Architecture\Variable\x86_64\Variable::variables(),
                \PHPOS\Architecture\Operation\x86_64\Mnemonic::operations(),
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