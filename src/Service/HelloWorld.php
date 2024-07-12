<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\IndexRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\Architecture\Register\SegmentRegisterInterface;
use PHPOS\Architecture\Support\Hex;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;
use PHPOS\Operation\Call;
use PHPOS\Operation\Mov;

class HelloWorld implements ServiceInterface
{
    use BaseService;

    public function process(): InstructionInterface
    {
        $registers = $this->bootloader->architecture()->runtime()->registers();
        $ac = $registers->get(RegisterType::ACCUMULATOR);
        assert($ac instanceof DataRegisterInterface);

        $ds = $registers->get(RegisterType::DATA_SEGMENT);
        assert($ds instanceof SegmentRegisterInterface);

        $si = $registers->get(RegisterType::SOURCE_INDEX);
        assert($si instanceof IndexRegisterInterface);

        $this->bootloader->architecture()->runtime()
            ->setVariable('hello_world', 'Hello World!');

        // Test
        return (new Instruction($this->bootloader))
            ->section(
                'main',
                fn (InstructionInterface $instruction) => $instruction
                    ->append(Mov::class, $ac->x(), new Hex(0x07C0))
                    ->append(Mov::class, $ds->segment(), $ac->x())

                    ->append(Mov::class, $si->index(), new Hex(0x10))
                    ->append(Call::class, 'hello_world')
            );
    }
}
