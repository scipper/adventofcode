<?php

declare(strict_types=1);

namespace AdventOfCode\Y2023\Day2\HandShapes;

class Paper implements HandShape
{

    public function getPoints(): int
    {
        return 2;
    }

    public function isSameAs(HandShape $handShape): bool
    {
        return $handShape instanceof Paper;
    }

    public function beats(HandShape $handShape): bool
    {
        return $handShape instanceof Rock;
    }
}