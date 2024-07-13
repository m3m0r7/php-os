<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterWithHighAndLowInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Register\SegmentRegisterInterface;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Bootloader\BootloaderInfo;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Operation\Call;
use PHPOS\Operation\Mov;

class HelloWorld implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->bootloader->architecture()->runtime()->registers();
        $ac = $registers->get(RegisterType::ACCUMULATOR_BITS_16);
        assert($ac instanceof DataRegisterWithHighAndLowInterface);

        $ds = $registers->get(RegisterType::DATA_SEGMENT);
        assert($ds instanceof SegmentRegisterInterface);

        $si = $registers->get(RegisterType::SOURCE_INDEX_BITS_16);
        assert($si instanceof IndexRegisterInterface);

        $es = $registers->get(RegisterType::EXTRA_SEGMENT);
        assert($es instanceof SegmentRegisterInterface);

        $helloWorld = $this->bootloader->architecture()->runtime()
            ->setVariable('hello_world', 'Hello World!');

        // Test
        return (new Instruction($this->bootloader))
            ->section(
                'main',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ac->value(), new Hex(BootloaderInfo::MBR->value))
                    ->append(Mov::class, $ds->segment(), $ac->value())
                    ->append(Mov::class, $es->segment(), $ac->value())

                    ->append(Mov::class, $si->index(), $helloWorld->name())
                    ->append(Call::class, new PrintString($this->bootloader))
            );
    }
}
