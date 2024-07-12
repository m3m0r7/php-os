<?php
declare(strict_types=1);
namespace PHPOS\Service;

use PHPOS\InstructionInterface;

interface ServiceInterface
{
    public function __construct(InstructionInterface $instruction);
    public function assemble(): InstructionInterface;
}
