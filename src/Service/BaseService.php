<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\InstructionInterface;

trait BaseService
{
    public function __construct(protected InstructionInterface $instruction) {
        $this->instruction = clone $this->instruction;
    }
}
