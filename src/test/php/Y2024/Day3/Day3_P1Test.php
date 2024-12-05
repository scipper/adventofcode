<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day3;

use AdventOfCode\Y2024\Day2\Day2Solution;
use PHPUnit\Framework\TestCase;

class Day3_P1Test extends TestCase {

    private Day3Solution $solution;

    public function setUp(): void {
        $this->solution = new Day3Solution();
    }

    public function test_multiplies_two_digits() {
        $this->assertSame(4, $this->solution->multiply("mul(2,2)"));
    }

    public function test_returns_0_if_expression_contains_spaces() {
        $this->assertSame(0, $this->solution->multiply("mul ( 1 , 1 ) "));
    }

    public function test_returns_0_if_expression_contains_invalid_char() {
        $this->assertSame(0, $this->solution->multiply("mul(1,1*"));
    }

    public function test_can_handle_prefixed_mul() {
        $this->assertSame(1, $this->solution->multiply("xmul(1,1)"));
    }

    public function test_multiplies_multiple_muls_and_adds_results() {
        $this->assertSame(13, $this->solution->multiply("mul(2,2)mul(3,3)"));
    }

    public function test_multiplies_multiple_muls_with_corrupted_in_between() {
        $this->assertSame(161, $this->solution->multiply("xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))"));
    }

    public function test_puzzle_input() {
        $input = file_get_contents(__DIR__ . "/input.txt");
        $this->assertSame(157621318, $this->solution->multiply($input));
    }

}
