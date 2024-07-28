<?php

declare(strict_types=1);

namespace PHPOS\Assembly\Processor;

use PHPOS\OS\CodeInterface;
use PHPOS\OS\DefineInterface;
use PHPOS\OS\InstructionInterface;
use PHPOS\Runtime\KeyValue;
use PHPOS\Service\BIOS\Standard\DefineBitSize;
use PHPOS\Service\BIOS\Standard\DefineOrigin;
use PHPOS\Service\BIOS\Standard\Times;
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

        $preProcessedServices = [];
        foreach ($this->createServices() as [$service, $parameters]) {
            $service = new $service($this->code, null, ...$parameters);

            assert($service instanceof ServiceInterface);
            $preProcessedServices[] = $service->process();
        }

        /**
         * @var KeyValue $value
         */
        foreach ($this->code->architecture()->runtime()->reserveBytes() as $value) {
            if (!$value->option()->isExtern()) {
                $assembly .= sprintf(
                    "%s: resb %d\n",
                    $value->name(),
                    $value->value(),
                );
            }
            if ($value->option()->isGlobal()) {
                $assembly .= sprintf(
                    "global %s\n",
                    $value->name(),
                );
            }
        }

        /**
         * @var KeyValue $value
         */
        foreach ($this->code->architecture()->runtime()->reserveBytes() as $value) {
            if (!$value->option()->isExtern()) {
                continue;
            }

            $assembly .= sprintf(
                "extern %s\n",
                $value->name(),
            );
        }

        foreach ($preProcessedServices as $service) {
            assert($service instanceof InstructionInterface);
            $assembly .= $service->assemble() . "\n";
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

        /**
         * @var KeyValue $value
         */
        foreach ($this->code->architecture()->runtime()->definedNullFilledVariables() as $value) {
            $assembly .= $value->name() . ":\n  " . (new Times(
                    $this->code,
                    null,
                    $value->value(),
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
