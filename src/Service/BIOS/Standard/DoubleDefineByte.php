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

class DoubleDefineByte implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $variables = $this->code->architecture()->runtime()->variables();

        /**
         * @var string|Hex|int $value
         * @var ?VariableType $variableType
         */
        [$value, $variableType] = $this->parameters + [null, null];

        $db = $variables->get($variableType ?? VariableType::BITS_16);

        $destination = $value;
        $sources = [];

        if (!($value instanceof Hex) && (is_string($value) || $value instanceof \Stringable)) {
            // Add null byte
            $sources[] = 0;
        }

        return (new Instruction($this->code))
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
                $destination,
                ...$sources,
            );
    }
}
