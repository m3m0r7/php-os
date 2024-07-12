<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\BootloaderInterface;
use PHPOS\Instruction;
use PHPOS\InstructionInterface;
use PHPOS\Operation\Ret;

class Return_ implements ServiceInterface
{
    use BaseService;

    public function __construct(protected BootloaderInterface $bootloader)
    {}

    public function process(): InstructionInterface
    {
        return (new Instruction($this->bootloader))
            ->append(Ret::class);
    }
}
