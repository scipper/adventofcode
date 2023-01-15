<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

class RockPaperScissorsGame
{

    private string $strategy;

    public function __construct(string $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getPointsForPlayer(): int
    {
        $playerPoints = 0;
        $turns = $this->splitUpTurns();
        foreach ($turns as $turn) {
            $trimmedTurn = trim($turn);
            if (strlen($trimmedTurn) === 3) {
                list($opponent, $player) = $this->getOpponentAndPlayerTurn($trimmedTurn);
                if ($player === PlayerTurns::$Rock) {
                    $playerPoints += 1;
                    if ($opponent === OpponentsTurn::$Rock) {
                        $playerPoints += 3;
                    }
                    if ($opponent === OpponentsTurn::$Scissors) {
                        $playerPoints += 6;
                    }
                }
                if ($player === PlayerTurns::$Paper) {
                    $playerPoints += 2;
                    if ($opponent === OpponentsTurn::$Rock) {
                        $playerPoints += 6;
                    }
                    if ($opponent === OpponentsTurn::$Paper) {
                        $playerPoints += 3;
                    }
                }
                if ($player === PlayerTurns::$Scissors) {
                    $playerPoints += 3;
                    if ($opponent === OpponentsTurn::$Paper) {
                        $playerPoints += 6;
                    }
                    if ($opponent === OpponentsTurn::$Scissors) {
                        $playerPoints += 3;
                    }
                }
            }
        }
        return $playerPoints;
    }

    private function splitUpTurns()
    {
        return explode("\n", $this->strategy);
    }

    public function getOpponentAndPlayerTurn(string $trimmedTurn): array
    {
        [$opponent, $player] = explode(" ", $trimmedTurn);
        return array($opponent, $player);
    }
}