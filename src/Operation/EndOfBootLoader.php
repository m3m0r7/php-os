<?php
declare(strict_types=1);
namespace PHPOS\Operation;

use PHPOS\Architecture\Architecture;
use PHPOS\Architecture\Operation\DestinationInterface;
use PHPOS\Architecture\Operation\OperationInterface;
use PHPOS\Architecture\Operation\SourceInterface;
use PHPOS\Architecture\Variable\VariableType;

class EndOfBootLoader implements OperationInterface
{
    public function __construct(protected Architecture $architecture)
    {
    }


    public function process(DestinationInterface $destination, SourceInterface ...$sources): string
    {
        $variables = $this->architecture->runtime()->variables();
        $db = $variables->get(VariableType::BITS_8);

        return $this->architecture
            ->runtime()
            ->callRaw(
                <<< __ASM__
                times 510-($-$$) {$db->realName()} 0
                {$db->realName()} 0x55
                {$db->realName()} 0xAA
                __ASM__,
            );
    }
}
