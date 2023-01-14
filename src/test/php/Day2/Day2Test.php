<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{

    /**
     * @test
     */
    public function opponentWinsWithRockVsScissors()
    {
        $turns = "
        A Z
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(3, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function opponentWinsWithPaperVsRock()
    {
        $turns = "
        B X
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(1, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function opponentWinsWithScissorsVsPaper()
    {
        $turns = "
        C Y
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(2, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsWithRockVsScissors()
    {
        $turns = "
        C X
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(7, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsWithPaperVsRock()
    {
        $turns = "
        A Y
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(8, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsWithScissorsVsPaper()
    {
        $turns = "
        B Z
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(9, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function drawOnRockVsRock()
    {
        $turns = "
        A X
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(4, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function drawOnPaperVsPaper()
    {
        $turns = "
        B Y
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(5, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function drawOnScissorsVsScissors()
    {
        $turns = "
        C Z
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(6, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsTwoRoundsWithRock()
    {
        $turns = "
        C X
        C X
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(14, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsTwoRoundsWithPaper()
    {
        $turns = "
        A Y
        A Y
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(16, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsTwoRoundsWithScissors()
    {
        $turns = "
        B Z
        B Z
        ";

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(18, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playCompleteGuide()
    {
        $filename = "input.txt";
        $file = fopen($filename, "r");

        $filesize = filesize($filename);
        $turns = fread($file, $filesize);
        fclose($file);

        $game = new RockPaperScissorsGame($turns);

        $this->assertEquals(11841, $game->getPointsForPlayer());
    }

}
