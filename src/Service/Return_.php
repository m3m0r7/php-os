<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\Architecture\Register\DataRegisterInterface;
use PHPOS\Architecture\Register\RegisterType;
use PHPOS\InstructionInterface;

class Return_ implements ServiceInterface
{
    use BaseService;

    public function assemble(): InstructionInterface
    {
        return (clone $this->instruction)
            ->ret();
    }
}
