<?php

declare(strict_types=1);

namespace PHPOS\Assembly\Processor;

use PHPOS\OS\CodeInterface;
use PHPOS\OS\DefineInterface;
use PHPOS\OS\InstructionInterface;
use PHPOS\Runtime\KeyValueInterface;
use PHPOS\Service\BIOS\Standard\DefineBitSize;
use PHPOS\Service\BIOS\Standard\DefineOrigin;
use PHPOS\Service\BIOS\Standard\Times;
use PHPOS\Service\BIOS\Standard\Variable;
use PHPOS\Service\Component\Extern;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManager;
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
        $extern = [];

        $serviceManager = new ServiceManager(
            $this->code,
        );

        foreach ($this->createServices() as [$service, $parameters]) {
            $serviceComponent = $serviceManager->createComponent();
            $service = $serviceComponent->createIndependencyService($service, ...$parameters);

            assert($service instanceof ServiceInterface);

            $extern[] = $service->extern();
            $preProcessedServices[] = $service->process($serviceComponent);
        }

        /**
         * @var KeyValueInterface $value
         */
        foreach ($this->code->architecture()->runtime()->reserveBytes() as $value) {
            $assembly .= sprintf(
                "%s: resb %d\n",
                $value->name(),
                $value->value(),
            );
        }

        /**
         * @var Extern $externValues
         */
        foreach ($extern as $externValues) {
            /**
             * @var KeyValueInterface $value
             */
            foreach ($externValues->values() as $value) {
                $assembly .= sprintf(
                    "extern %s\n",
                    $value->name(),
                );
            }
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
         * @var KeyValueInterface $value
         */
        foreach ($this->code->architecture()->runtime()->definedVariables() as $value) {
            $serviceComponent = $serviceManager->createComponent();
            $service = $serviceComponent->createIndependencyService(Variable::class, $value);
            $assembly .= $service->process($serviceComponent)->assemble() . "\n";
        }

        /**
         * @var KeyValueInterface $value
         */
        foreach ($this->code->architecture()->runtime()->definedNullFilledVariables() as $value) {
            $serviceComponent = $serviceManager->createComponent();
            $service = $serviceComponent->createIndependencyService(Times::class, $value->value());

            $assembly .= $value->name() . ":\n  " . $service->process($serviceComponent)->assemble() . "\n";
        }

        foreach ($this->postServices as [$service, $parameters]) {
            $serviceComponent = $serviceManager->createComponent();
            $service = $serviceComponent->createIndependencyService($service, ...$parameters);

            assert($service instanceof ServiceInterface);
            $assembly .= $service->process($serviceComponent)->assemble() . "\n";
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
