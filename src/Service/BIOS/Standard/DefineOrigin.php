<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Standard;

use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager\ServiceComponentInterface;

class DefineOrigin implements ServiceInterface
{
    use BaseService;

    public function process(ServiceComponentInterface $serviceComponent): InstructionInterface
    {
        $variables = $this->code->architecture()->runtime()->variables();

        /**
         * @var int $origin
         */
        [$origin] = $this->parameters + [0];

        assert(is_int($origin));

        return (new Instruction($this->code, $serviceComponent))
            ->append(
                fn () => $this
                    ->code
                    ->architecture()
                    ->runtime()
                    ->callRaw(
                        sprintf(
                            <<< __ASM__
                            [org 0x%04x]
                            __ASM__,
                            $origin
                        ),
                    ),
            );
    }
}
