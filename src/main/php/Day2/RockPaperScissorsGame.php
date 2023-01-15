<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

use AdventOfCode\Day2\HandShapes\HandShapeFactory;
use AdventOfCode\Day2\Input\InvalidInputException;
use AdventOfCode\Day2\Points\Points;

class RockPaperScissorsGame
{

    private string $strategy;
    private HandShapeFactory $handShapeFactory;

    public function __construct(string $strategy)
    {
        $this->strategy = $strategy;
        $this->handShapeFactory = new HandShapeFactory();
    }

    /**
     * @throws InvalidInputException
     */
    public function getPointsForPlayer(): int
    {
        $points = 0;
        $lines = $this->splitUpStrategyToLines();
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

    private function splitUpStrategyToLines()
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
        $opponentHandShape = $this->handShapeFactory->getHandShape($opponentInput);
        $playerHandShape = $this->handShapeFactory->getHandShape($playerInput);
        return array($opponentHandShape, $playerHandShape);
    }
}