<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Standard;

use PHPOS\OS\BitType;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class DefineBitSize implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $variables = $this->code->architecture()->runtime()->variables();

        /**
         * @var BitType $bitType
         */
        [$bitType] = $this->parameters + [BitType::BIT_16];

        assert($bitType instanceof BitType);

        return (new Instruction($this->code, $serviceManager))
            ->append(
                fn () => $this
                    ->code
                    ->architecture()
                    ->runtime()
                    ->callRaw(
                        sprintf(
                            <<< __ASM__
                            [bits %d]
                            __ASM__,
                            $bitType->value
                        ),
                    ),
            );
    }
}
