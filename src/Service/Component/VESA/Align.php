<?php

declare(strict_types=1);

namespace PHPOS\Service\Component\VESA;

class Align
{
    public function __construct(protected AlignType $alignType)
    {
    }


    public function calculateAlignmentPos(int $destinationWidth, int $destinationHeight, int $sourceWidth, int $sourceHeight): array
    {
        return match ($this->alignType) {
            AlignType::TOP_LEFT => [0, 0],
            AlignType::TOP_CENTER => [($destinationWidth - $sourceWidth) / 2, 0],
            AlignType::TOP_RIGHT => [$destinationWidth - $sourceWidth, 0],

            AlignType::CENTER_LEFT => [0, ($destinationHeight - $sourceHeight) / 2],
            AlignType::CENTER_CENTER => [($destinationWidth - $sourceWidth) / 2, ($destinationHeight - $sourceHeight) / 2],
            AlignType::CENTER_RIGHT => [$destinationWidth - $sourceWidth, ($destinationHeight - $sourceHeight) / 2],


            AlignType::BOTTOM_LEFT => [0, $destinationHeight - $sourceHeight],
            AlignType::BOTTOM_CENTER => [($destinationWidth - $sourceWidth) / 2, $destinationHeight - $sourceHeight],
            AlignType::BOTTOM_RIGHT => [$destinationWidth - $sourceWidth, $destinationHeight - $sourceHeight],
        };
    }

    public function calculateIndexByImageBitType(VideoBitType $imageBitType, int $destinationWidth, int $destinationHeight, int $sourceWidth, int $sourceHeight): int
    {
        [$x, $y] = $this->calculateAlignmentPos($destinationWidth, $destinationHeight, $sourceWidth, $sourceHeight);

        return ($imageBitType->value / 8) * $x + ($imageBitType->value / 8) * $destinationWidth * $y;
    }
}