<?php
declare(strict_types=1);
namespace PHPOS;

interface InstructionInterface
{
    public function raw(): InstructionInterface;
}
