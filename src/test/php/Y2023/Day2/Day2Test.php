<?php

declare(strict_types=1);

namespace Y2023\Day2;

use AdventOfCode\Y2023\Day2\RockPaperScissorsGame;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{

    /**
     * @test
     */
    public function opponentWinsWithRockVsScissors()
    {
        $strategy = "
        A Z
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(3, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function opponentWinsWithPaperVsRock()
    {
        $strategy = "
        B X
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(1, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function opponentWinsWithScissorsVsPaper()
    {
        $strategy = "
        C Y
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(2, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsWithRockVsScissors()
    {
        $strategy = "
        C X
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(7, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsWithPaperVsRock()
    {
        $strategy = "
        A Y
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(8, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsWithScissorsVsPaper()
    {
        $strategy = "
        B Z
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(9, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function drawOnRockVsRock()
    {
        $strategy = "
        A X
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(4, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function drawOnPaperVsPaper()
    {
        $strategy = "
        B Y
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(5, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function drawOnScissorsVsScissors()
    {
        $strategy = "
        C Z
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(6, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsTwoRoundsWithRock()
    {
        $strategy = "
        C X
        C X
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(14, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsTwoRoundsWithPaper()
    {
        $strategy = "
        A Y
        A Y
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(16, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playerWinsTwoRoundsWithScissors()
    {
        $strategy = "
        B Z
        B Z
        ";

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(18, $game->getPointsForPlayer());
    }

    /**
     * @test
     */
    public function playCompleteGuide()
    {
        $filename = __DIR__ . "/input.txt";
        $file = fopen($filename, "r");

        $filesize = filesize($filename);
        $strategy = fread($file, $filesize);
        fclose($file);

        $game = new RockPaperScissorsGame($strategy);

        $this->assertEquals(11841, $game->getPointsForPlayer());
    }

}
