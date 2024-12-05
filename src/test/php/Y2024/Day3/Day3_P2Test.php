<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day3;

use PHPUnit\Framework\TestCase;

class Day3_P2Test extends TestCase {

    private Day3Solution $solution;

    public function setUp(): void {
        $this->solution = new Day3Solution();
    }

    public function test_dont_disabled_mul() {
        $this->assertSame(0, $this->solution->multiplyEnabled("don't()mul(2,2)"));
    }

    public function test_enables_mul_after_do() {
        $this->assertSame(9, $this->solution->multiplyEnabled("don't()mul(2,2)do()mul(3,3)"));
    }

    public function test_disabled_multiple_muls() {
        $this->assertSame(48, $this->solution->multiplyEnabled("xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))"));
    }

    public function test_puzzle_input() {
        $input = file_get_contents(__DIR__ . "/input.txt");
        $this->assertSame(79845780, $this->solution->multiplyEnabled($input));
    }

}
