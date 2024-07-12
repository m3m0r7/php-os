<?php
declare(strict_types=1);
namespace PHPOS\Architecture\Operation;

use PHPOS\Architecture\Register\RegisterInterface;
use PHPOS\Service\ServiceInterface;

trait GeneralOperand
{
    public function __construct(protected mixed $valueOf)
    {
    }

    public function __toString(): string
    {
        if ($this->valueOf === null) {
            return '';
        }
        if ($this->valueOf instanceof RegisterInterface) {
            return $this->valueOf->realName();
        }
        if ($this->valueOf instanceof ServiceInterface) {
            return $this->valueOf->label();
        }
        var_dump(1234, $this->valueOf);
        exit();
    }
}