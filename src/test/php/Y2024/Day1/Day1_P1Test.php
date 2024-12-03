<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day1;

use PHPUnit\Framework\TestCase;

class Day1_P1Test extends TestCase {

    private Day1Solution $solution;

    public function setUp(): void {
        $this->solution = new Day1Solution();
    }

    public function test_1_1_delta_0() {
        $this->assertSame(0, $this->solution->getDelta("1   1"));
    }

    public function test_0_1_delta_1() {
        $this->assertSame(1, $this->solution->getDelta("0   1"));
    }

    public function test_1_0_delta_1() {
        $this->assertSame(1, $this->solution->getDelta("1   0"));
    }

    public function test_get_delta_sum_of_two_rows() {
        $input = <<<EOL
1   2
3   4
EOL;
        $this->assertSame(2, $this->solution->getDelta($input));
    }

    public function test_get_delta_sum_of_two_unsorted_rows() {
        $input = <<<EOL
1   2
2   1
EOL;
        $this->assertSame(0, $this->solution->getDelta($input));
    }

    public function test_puzzle_input() {
        $input = file_get_contents(__DIR__ . "/input.txt");;
        $this->assertSame(1189304, $this->solution->getDelta($input));
    }

}
