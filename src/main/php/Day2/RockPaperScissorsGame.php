<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

use AdventOfCode\Day2\HandShapes\HandShapeFactory;
use AdventOfCode\Day2\Input\InvalidInputException;
use AdventOfCode\Day2\Points\Points;

class RockPaperScissorsGame
{

    private string $strategy;
    private HandShapeFactory $turnFactory;

    public function __construct(string $strategy)
    {
        $this->strategy = $strategy;
        $this->turnFactory = new HandShapeFactory();
    }

    /**
     * @throws InvalidInputException
     */
    public function getPointsForPlayer(): int
    {
        $points = 0;
        $lines = $this->splitUpLines();
        foreach ($lines as $line) {
            $turn = $this->getTurnFromLine($line);
            if ($this->isValidTurn($turn)) {
                list($opponentHandShape, $playerHandShape) = $this->getOpponentAndPlayerHandShapes($turn);
                $points += $playerHandShape->getPoints();
                if ($playerHandShape->isSameAs($opponentHandShape)) {
                    $points += Points::$Draw;
                }
                if ($playerHandShape->beats($opponentHandShape)) {
                    $points += Points::$Win;
                }
            }
        }
        return $points;
    }

    private function splitUpLines()
    {
        return explode("\n", $this->strategy);
    }

    public function getTurnFromLine($line): string
    {
        return trim($line);
    }

    public function isValidTurn(string $trimmedTurn): bool
    {
        return strlen($trimmedTurn) === 3;
    }

    /**
     * @throws InvalidInputException
     */
    public function getOpponentAndPlayerHandShapes(string $encryptedInput): array
    {
        [$opponentInput, $playerInput] = explode(" ", $encryptedInput);
        $opponentHandShape = $this->turnFactory->getHandShape($opponentInput);
        $playerHandShape = $this->turnFactory->getHandShape($playerInput);
        return array($opponentHandShape, $playerHandShape);
    }
}