<?php

declare(strict_types=1);

namespace AdventOfCode\Day1;

class Backpack
{

    private string $caloriesList;

    public function __construct(string $caloriesList)
    {
        $this->caloriesList = $caloriesList;
    }

    public function getTotalCaloriesOfElfWithMostCalories(): int
    {
        $inventories = [];
        $removedSpaces = str_replace(" ", "", $this->caloriesList);
        $inventoryStrings = explode("\n\n", $removedSpaces);
        foreach ($inventoryStrings as $inventoryString) {
            $lines = explode("\n", $inventoryString);
            $inventories[] = $this->getSumOfAllLines($lines);
        }
        return max($inventories);
    }

    /**
     * @param $lines
     * @return int
     */
    public function getSumOfAllLines($lines): int
    {
        $calories = 0;
        foreach ($lines as $line) {
            $calories += intval($line);
        }
        return $calories;
    }

}