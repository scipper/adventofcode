<?php

declare(strict_types=1);

namespace AdventOfCode\Day2\HandShapes;

interface HandShape
{
    public function getPoints(): int;

    public function isSameAs(HandShape $handShape): bool;

    public function beats(HandShape $handShape): bool;
}