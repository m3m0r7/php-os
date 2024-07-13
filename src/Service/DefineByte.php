<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Architecture\Variable\VariableType;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;

class DefineByte implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $variables = $this->bootloader->architecture()->runtime()->variables();

        /**
         * @var string|Hex|int $value
         * @var ?VariableType $variableType
         */
        [$value, $variableType] = $this->parameters + [null, null];

        $db = $variables->get($variableType ?? VariableType::BITS_8);

        $destination = $value;
        $sources = [];

        return (new Instruction($this->bootloader))
            ->append(fn (DestinationInterface $destination, SourceInterface ...$sources) => $this
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
                        )
                    ),
                ),
                $destination,
                ...$sources,
            );
    }
}
