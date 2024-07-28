<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Standard;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class DefineBytes implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $variables = $this->code->architecture()->runtime()->variables();

        /**
         * @var ?VariableType $variableType
         * @var array $sources
         * @var int $chunkSize
         */
        [$variableType, $chunkSize, $sources] = $this->parameters + [null, null];

        $db = $variables->get($variableType ?? VariableType::BITS_8);

        $instruction = new Instruction($this->code, $serviceManager);

        foreach (array_chunk($sources, $chunkSize) as $chunkedSource) {
            $instruction = $instruction
                ->append(
                    fn (DestinationInterface $destination, SourceInterface ...$sources) => $this
                        ->code
                        ->architecture()
                        ->runtime()
                        ->callRaw(
                            sprintf(
                                <<< __ASM__
                                %s %s
                                __ASM__,
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
                                )
                            ),
                        ),
                    ...$chunkedSource,
                );
        }

        return $instruction;
    }
}
