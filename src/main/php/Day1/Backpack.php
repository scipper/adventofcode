<?php

declare(strict_types=1);

namespace AdventOfCode\Day1;

class Backpack
{

    private string $caloriesList;

    public function __construct(string $caloriesList)
    {
        $this->caloriesList = str_replace(" ", "", $caloriesList);
    }

    public function getTotalCaloriesOfElfWithMostCalories(): int
    {
        return max($this->sumUpAllCalories());
    }

    private function sumUpAllCalories(): array
    {
        $sumOfCaloriesOfAllElves = [];
        $inventories = $this->splitUpInventories($this->caloriesList);
        foreach ($inventories as $inventory) {
            $lines = $this->splitUpLines($inventory);
            $sumOfCaloriesOfAllElves[] = $this->getSumOfCaloriesOfAllLines($lines);
        }
        return $sumOfCaloriesOfAllElves;
    }

    private function splitUpInventories($removedSpaces)
    {
        return explode("\n\n", $removedSpaces);
    }

    private function splitUpLines($inventory)
    {
        return explode("\n", $inventory);
    }

    private function getSumOfCaloriesOfAllLines($lines): int
    {
        $calories = 0;
        foreach ($lines as $line) {
            $calories += intval($line);
        }
        return $calories;
    }

}