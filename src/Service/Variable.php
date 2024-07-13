<?php

declare(strict_types=1);

namespace PHPOS\Service;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Support\Text;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Runtime\VariableDefinitionInterface;

class Variable implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $variables = $this->bootloader->architecture()->runtime()->variables();

        /**
         * @var ?VariableDefinitionInterface $variable
         * @var ?VariableType $variableType
         */
        [$variable, $variableType] = $this->parameters + [null, null, null];

        $db = $variables->get($variableType ?? VariableType::BITS_8);

        assert($variable instanceof VariableDefinitionInterface);

        $destination = is_string($variable->value()) || $variable->value() instanceof \Stringable
            ? new Text((string) $variable->value())
            : $variable;


        $sources = [];
        if ($destination instanceof Text) {
            // Insert Null-bytes for string
            $sources = [0];
        }

        return (new Instruction($this->bootloader))
            ->label(
                $variable->name(),
                fn (InstructionInterface $instruction) => $instruction
                    ->append(
                        fn (DestinationInterface $destination, SourceInterface ...$sources) => $this
                        ->bootloader
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
                                ),
                            ),
                        ),
                        $destination,
                        ...$sources
                    ),
            );
    }
}
