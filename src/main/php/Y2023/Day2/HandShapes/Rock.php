<?php

declare(strict_types=1);

namespace AdventOfCode\Y2023\Day2\HandShapes;

class Rock implements HandShape
{

    public function getPoints(): int
    {
        return 1;
    }

    public function isSameAs(HandShape $handShape): bool
    {
        return $handShape instanceof Rock;
    }

    public function beats(HandShape $handShape): bool
    {
        return $handShape instanceof Scissors;
    }
}