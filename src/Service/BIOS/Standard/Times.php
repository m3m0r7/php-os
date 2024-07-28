<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Standard;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class Times implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        /**
         * @var string $loops
         */
        [$loops, $destination, $variableType] = $this->parameters + ['0', '0', VariableType::BITS_8];


        return (new Instruction($this->code, $serviceManager))
            ->append(
                function (DestinationInterface $destination, SourceInterface ...$sources) use ($loops, $variableType) {
                    $variables = $this->code->architecture()->runtime()->variables();
                    $db = $variables->get($variableType);

                    return $this
                        ->code
                        ->architecture()
                        ->runtime()
                        ->callRaw(
                            sprintf(
                                <<< __ASM__
                                times %s %s %s
                                __ASM__,
                                $loops,
                                $db->realName(),
                                implode(
                                    ', ',
                                    [
                                        (string) $destination,
                                        ...array_map(
                                            fn (SourceInterface $source) => (string) $source,
                                            $sources,
                                        ),
                                    ],
                                ),
                            )
                        );
                },
                $destination,
            );
    }
}
