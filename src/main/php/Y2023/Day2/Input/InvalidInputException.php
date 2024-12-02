<?php

declare(strict_types=1);

namespace AdventOfCode\Y2023\Day2\Input;

use Exception;

class InvalidInputException extends Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}