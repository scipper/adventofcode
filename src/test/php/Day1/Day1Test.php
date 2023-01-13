<?php

declare(strict_types=1);

namespace AdventOfCode\Day1;

use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{

    /**
     * @test
     */
    public function getOneElvesInventory()
    {
        $caloriesList = "
        1
        ";

        $backpack = new Backpack($caloriesList);

        $this->assertEquals(1, $backpack->getTotalCaloriesOfElfWithMostCalories());
    }

    /**
     * @test
     */
    public function getSecondElvesInventory_WhenItIsLargerThanFirst()
    {
        $caloriesList = "
        1
        
        2
        ";

        $backpack = new Backpack($caloriesList);

        $this->assertEquals(2, $backpack->getTotalCaloriesOfElfWithMostCalories());
    }

    /**
     * @test
     */
    public function getFirstElvesInventory_WhenItIsLargerThanSecond()
    {
        $caloriesList = "
        2
        
        1
        ";

        $backpack = new Backpack($caloriesList);

        $this->assertEquals(2, $backpack->getTotalCaloriesOfElfWithMostCalories());
    }

    /**
     * @test
     */
    public function getSumOfOneElvesInventory()
    {
        $caloriesList = "
        1
        2
        3
        ";

        $backpack = new Backpack($caloriesList);

        $this->assertEquals(6, $backpack->getTotalCaloriesOfElfWithMostCalories());
    }

    /**
     * @test
     */
    public function getLargestInventory()
    {
        $filename = "input.txt";
        $file = fopen($filename, "r");

        $filesize = filesize($filename);
        $caloriesList = fread($file, $filesize);
        fclose($file);

        $backpack = new Backpack($caloriesList);

        $this->assertEquals(72478, $backpack->getTotalCaloriesOfElfWithMostCalories());
    }

}
