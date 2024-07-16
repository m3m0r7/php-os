<?php

declare(strict_types=1);

namespace PHPOS\Assembly\Processor;

use PHPOS\Architecture\Support\Hex;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\DefineInterface;
use PHPOS\Runtime\KeyValue;
use PHPOS\Service\BIOS\Standard\DefineBitSize;
use PHPOS\Service\BIOS\Standard\DefineOrigin;
use PHPOS\Service\BIOS\Standard\Variable;
use PHPOS\Service\ServiceInterface;
use PHPOS\Utility\AutomaticallyGeneratedFileSignature;

class Text implements ProcessorInterface
{
    public function __construct(protected CodeInterface $code, protected array $services = [], protected array $postServices = [])
    {
    }

    public function process(): string
    {
        $assembly = '';

        foreach ($this->createServices() as [$service, $parameters]) {
            $service = new $service($this->code, null, ...$parameters);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        $definitions = '';
        /**
         * @var DefineInterface $value
         */
        foreach ($this->code->architecture()->runtime()->definedDefinitions() as $value) {
            $definitions .= sprintf(
                "%%define %s %s" . "\n",
                $value->name(),
                $value->value() ?? '(null)',
            );
        }

        $assembly = $definitions . "\n" . $assembly;

        /**
         * @var KeyValue $value
         */
        foreach ($this->code->architecture()->runtime()->definedVariables() as $value) {
            $assembly .= (new Variable(
                $this->code,
                null,
                $value,
            ))->process()->assemble() . "\n";
        }

        foreach ($this->postServices as [$service, $parameters]) {
            $service = new $service($this->code, null, ...$parameters);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process()->assemble() . "\n";
        }

        return AutomaticallyGeneratedFileSignature::createHeader(';') . $assembly;
    }

    private function createServices(): array
    {
        return [
            [DefineBitSize::class, [$this->code->bits()]],
            [DefineOrigin::class, [$this->code->origin()]],
            ...$this->services,
        ];
    }
}
