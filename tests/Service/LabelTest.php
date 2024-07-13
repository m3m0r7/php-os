<?php

declare(strict_types=1);

namespace PHPOS\Test\Service;

use PHPOS\Bootloader\BootloaderInterface;
use PHPOS\Bootloader\Instruction;
use PHPOS\Bootloader\InstructionInterface;
use PHPOS\Operation\Ret;
use PHPOS\Service\BaseService;
use PHPOS\Service\PrintCharacter;
use PHPOS\Service\ServiceInterface;
use PHPOS\Test\CreateBootloader;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class LabelTest extends TestCase
{
    use CreateBootloader;
    use MatchesSnapshots;

    #[DataProvider('architectures')]
    public function testLabel(BootloaderInterface $bootloader): void
    {
        $createLabelService = fn (?ServiceInterface $parent) => new class ($bootloader, $parent) implements ServiceInterface {
            use BaseService;

            public function process(): InstructionInterface
            {
                return (new Instruction($this->bootloader))
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
    public function testLabelWithEntity(BootloaderInterface $bootloader): void
    {
        $printCharacter = new PrintCharacter($bootloader, null);
        $this->assertSame(
            "__php_PHPOS_Service_PrintCharacter",
            $printCharacter->label(),
        );

        $this->assertSame(
            "__php_PHPOS_Service_PrintCharacter_PHPOS_Service_PrintCharacter",
            (new PrintCharacter($bootloader, $printCharacter))->label(),
        );
    }
}
