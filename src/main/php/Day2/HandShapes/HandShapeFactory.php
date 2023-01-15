<?php

declare(strict_types=1);

namespace AdventOfCode\Day2\HandShapes;

use AdventOfCode\Day2\Input\InvalidInputException;

class HandShapeFactory
{

    /**
     * @throws InvalidInputException
     */
    public function getHandShape(string $encryptedInput): HandShape
    {
        if ($encryptedInput === "X" ||
            $encryptedInput === "A") {
            return new Rock();
        }
        if ($encryptedInput === "Y" ||
            $encryptedInput === "B") {
            return new Paper();
        }
        if ($encryptedInput === "Z" ||
            $encryptedInput === "C") {
            return new Scissors();
        }

        throw new InvalidInputException("Input " . $encryptedInput . " is unknown.");
    }

}