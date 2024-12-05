<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day2;

use PHPUnit\Framework\TestCase;

class Day2_P1Test extends TestCase {

    private Day2Solution $solution;

    public function setUp(): void {
        $this->solution = new Day2Solution();
    }

    public function test_1_2_safe() {
        $this->assertSame(1, $this->solution->countSafeReportsStrict("1 2"));
    }

    public function test_2_1_safe() {
        $this->assertSame(1, $this->solution->countSafeReportsStrict("2 1"));
    }

    public function test_1_1_unsafe() {
        $this->assertSame(0, $this->solution->countSafeReportsStrict("1 1"));
    }

    public function test_1_3_unsafe() {
        $this->assertSame(1, $this->solution->countSafeReportsStrict("1 3"));
    }

    public function test_1_4_unsafe() {
        $this->assertSame(1, $this->solution->countSafeReportsStrict("1 4"));
    }

    public function test_1_5_unsafe() {
        $this->assertSame(0, $this->solution->countSafeReportsStrict("1 5"));
    }

    public function test_3_1_unsafe() {
        $this->assertSame(1, $this->solution->countSafeReportsStrict("3 1"));
    }

    public function test_4_1_unsafe() {
        $this->assertSame(1, $this->solution->countSafeReportsStrict("4 1"));
    }

    public function test_5_1_unsafe() {
        $this->assertSame(0, $this->solution->countSafeReportsStrict("5 1"));
    }

    public function test_1_2_1_unsafe() {
        $this->assertSame(0, $this->solution->countSafeReportsStrict("1 2 1"));
    }

    public function test_1_2_6_unsafe() {
        $this->assertSame(0, $this->solution->countSafeReportsStrict("1 2 6"));
    }

    public function test_counts_multiple_rows() {
        $input = <<<EOL
1 2 3 4 5
5 4 3 2 1
EOL;

        $this->assertSame(2, $this->solution->countSafeReportsStrict($input));
    }

    public function test_puzzle_row() {
        $input = <<<EOL
5 6 7 9 11 13 17
EOL;

        $this->assertSame(0, $this->solution->countSafeReportsStrict($input));
    }

    public function test_puzzle_input() {
        $input = file_get_contents(__DIR__ . "/input.txt");

        $this->assertSame(314, $this->solution->countSafeReportsStrict($input));
    }

}
