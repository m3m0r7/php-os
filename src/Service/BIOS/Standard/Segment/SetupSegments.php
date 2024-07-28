<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS\Standard\Segment;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Register\SegmentRegisterInterface;
use PHPOS\Architecture\Register\StackPointerRegisterInterface;
use PHPOS\Operation\Cli;
use PHPOS\Operation\Mov;
use PHPOS\Operation\Sti;
use PHPOS\Operation\Xor_;
use PHPOS\OS\BitType;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class SetupSegments implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        [$dataSegmentSelector, $withSetInterrupt] = $this->parameters + [null, true];
        assert($dataSegmentSelector === null || is_int($dataSegmentSelector));
        assert(is_bool($withSetInterrupt));

        $registers = $this->code->architecture()->runtime()->registers();

        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $base = $registers->get(RegisterType::BASE_BITS_16);
        assert($base instanceof DataRegisterWithHighAndLowInterface);

        $ds = $registers->get(RegisterType::DATA_SEGMENT);
        assert($ds instanceof SegmentRegisterInterface);

        $es = $registers->get(RegisterType::EXTRA_SEGMENT);
        assert($es instanceof SegmentRegisterInterface);

        $ss = $registers->get(RegisterType::STACK_SEGMENT);
        assert($ss instanceof SegmentRegisterInterface);

        $sp = $registers->get(RegisterType::STACK_POINTER_BITS_16);
        assert($sp instanceof StackPointerRegisterInterface);


        $instruction = new Instruction($this->code, $serviceManager);

        $instruction = $instruction->append(Cli::class);

        if ($dataSegmentSelector !== null) {
            $instruction = $instruction
                ->append(Mov::class, $ac->value(), $dataSegmentSelector)
                ->append(Mov::class, $base->value(), $dataSegmentSelector);
        } else {
            $instruction = $instruction
                ->append(Xor_::class, $ac->value(), $ac->value())
                ->append(Xor_::class, $base->value(), $base->value());
        }

        $instruction = $instruction
            ->append(Mov::class, $ds->segment(), $ac->value())
            ->append(Mov::class, $es->segment(), $ac->value())
            ->append(Mov::class, $ss->segment(), $ac->value())
            ->append(Mov::class, $sp->pointer(), $this->code->origin());

        if ($withSetInterrupt) {
            $instruction = $instruction
                ->append(Sti::class);
        }

        return $instruction;
    }
}
