<?php

declare(strict_types=1);

namespace AdventOfCode\Day2\HandShapes;

class Scissors implements HandShape
{

    public function getPoints(): int
    {
        return 3;
    }

    public function isSameAs(HandShape $handShape): bool
    {
        return $handShape instanceof Scissors;
    }

    public function beats(HandShape $handShape): bool
    {
        return $handShape instanceof Paper;
    }
}