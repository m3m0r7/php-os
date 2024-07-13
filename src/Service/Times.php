<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Operation\Jmp;

class Times implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        /**
         * @var string $loops
         */
        [$loops, $destination, $variableType] = $this->parameters + ['0', '0', VariableType::BITS_8];


        return (new Instruction($this->bootloader))
            ->append(
                function (DestinationInterface $destination, SourceInterface ...$sources) use ($loops, $variableType) {
                    $variables = $this->bootloader->architecture()->runtime()->variables();
                    $db = $variables->get($variableType);

                    return $this
                        ->bootloader
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
