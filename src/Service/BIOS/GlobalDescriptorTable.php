<?php

declare(strict_types=1);

namespace PHPOS\Service\BIOS;

use PHPOS\OS\Instruction;
use PHPOS\OS\InstructionInterface;
use PHPOS\Service\BaseService;
use PHPOS\Service\ServiceInterface;
use PHPOS\Service\ServiceManagerInterface;

class GlobalDescriptorTable implements ServiceInterface
{
    use BaseService;

    public function process(ServiceManagerInterface $serviceManager): InstructionInterface
    {
        $GDTStart = $this->label();
        $GDTNull = $this->label() . '_null';
        $GDTCode = $this->label() . '_code';
        $GDTData = $this->label() . '_data';
        $GDTEnd = $this->label() . '_end';

        $codeSegmentAccessByte = 0b10011010;
        $codeSegmentFlag = 0b11001111;

        $dataSegmentAccessByte = 0b10010010;
        $dataSegmentFlag = 0b11001111;

        return (new Instruction($this->code, $serviceManager))
            ->label(
                $GDTNull,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(
                        fn () => $this
                            ->code
                            ->architecture()
                            ->runtime()
                            ->callRaw(
                                sprintf(
                                    <<< __ASM__
                                    dq 0x0000000000000000
                                    __ASM__
                                ),
                            )
                    )
            )
            ->label(
                $GDTCode,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(
                        fn () => $this
                            ->code
                            ->architecture()
                            ->runtime()
                            ->callRaw(
                                sprintf(
                                    <<< __ASM__
                                    dw 0xFFFF
                                    dw 0x0000
                                    db 0x00
                                    db {$codeSegmentAccessByte}
                                    db {$codeSegmentFlag}
                                    db 0x00
                                    __ASM__
                                ),
                            )
                    )
            )
            ->label(
                $GDTData,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(
                        fn () => $this
                            ->code
                            ->architecture()
                            ->runtime()
                            ->callRaw(
                                sprintf(
                                    <<< __ASM__
                                    dw 0xFFFF
                                    dw 0x0000
                                    db 0x00
                                    db {$dataSegmentAccessByte}
                                    db {$dataSegmentFlag}
                                    db 0x00
                                    __ASM__
                                ),
                            )
                    )
            )
            ->label(
                $GDTEnd,
            )
            ->label(
                $GDTStart,
                fn (InstructionInterface $instruction) => $instruction
                    ->append(
                        fn () => $this
                            ->code
                            ->architecture()
                            ->runtime()
                            ->callRaw(
                                sprintf(
                                    <<< __ASM__
                                    dw {$GDTEnd} - {$GDTNull} - 1
                                    dd {$GDTNull}
                                    __ASM__
                                ),
                            )
                    )
            );
    }
}
