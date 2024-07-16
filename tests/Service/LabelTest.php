<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Operation\Ret;
use PHPOS\OS\CodeInterface;
use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\BIOS\IO\PrintCharacter;
use PHPOS\Service\ServiceInterface;
use PHPOS\Test\CreateCode;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class LabelTest extends TestCase
{
    use CreateCode;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testLabel(CodeInterface $code): void
    {
        $createLabelService = fn (?ServiceInterface $parent) => new class ($code, $parent) implements ServiceInterface {
            use BaseService;

            public function process(): InstructionInterface
            {
                return (new Instruction($this->code))
                    ->label(
                        $this->label(),
                        fn (InstructionInterface $instruction) => $instruction
                            ->append(Ret::class)
                    );
            }
        };

        $this->assertSame(
            "__php_PHPOS_Service_ServiceInterface__anonymous_LabelTest_php",
            $createLabelService(null)->label(),
        );

        $this->assertSame(
            "__php_PHPOS_Service_ServiceInterface__anonymous_LabelTest_php_PHPOS_Service_ServiceInterface__anonymous_LabelTest_php",
            $createLabelService($createLabelService(null))->label(),
        );
    }


    #[DataProvider('architectures')]
    public function testLabelWithEntity(CodeInterface $code): void
    {
        $printCharacter = new PrintCharacter($code, null);
        $this->assertSame(
            "__php_PHPOS_Service_BIOS_IO_PrintCharacter",
            $printCharacter->label(),
        );

        $this->assertSame(
            "__php_PHPOS_Service_BIOS_IO_PrintCharacter_PHPOS_Service_BIOS_IO_PrintCharacter",
            (new PrintCharacter($code, $printCharacter))->label(),
        );
    }
}
