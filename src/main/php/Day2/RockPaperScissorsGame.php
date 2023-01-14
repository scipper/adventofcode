<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

class RockPaperScissorsGame
{

    public function __construct(string $turns)
    {
        $this->turns = $turns;
    }

    public function getPointsForPlayer(): int
    {
        $playerPoints = 0;
        $turns = $this->splitUpTurns();
        foreach ($turns as $turn) {
            $trimmedTurn = trim($turn);
            if (strlen($trimmedTurn) === 3) {
                [$opponent, $player] = explode(" ", $trimmedTurn);
                if ($player === "X") {
                    $playerPoints += 1;
                    if ($opponent === "A") {
                        $playerPoints += 3;
                    }
                    if ($opponent === "C") {
                        $playerPoints += 6;
                    }
                }
                if ($player === "Y") {
                    $playerPoints += 2;
                    if ($opponent === "A") {
                        $playerPoints += 6;
                    }
                    if ($opponent === "B") {
                        $playerPoints += 3;
                    }
                }
                if ($player === "Z") {
                    $playerPoints += 3;
                    if ($opponent === "B") {
                        $playerPoints += 6;
                    }
                    if ($opponent === "C") {
                        $playerPoints += 3;
                    }
                }
            }
        }
        return $playerPoints;
    }

    private function splitUpTurns()
    {
        return explode("\n", $this->turns);
    }
}