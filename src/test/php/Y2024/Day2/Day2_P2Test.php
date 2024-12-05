<?php //declare(strict_types = 1);
//
//namespace AdventOfCode\Y2024\Day2;
//
//use PHPUnit\Framework\TestCase;
//
//class Day2_P2Test extends TestCase {
//
//    private Day2Solution $solution;
//
//    public function setUp(): void {
//        $this->solution = new Day2Solution();
//    }
//
//    public function test_tolerate_one_failure_in_level() {
//        $this->assertSame(1, $this->solution->countSafeReportsWithTolerance("1 2 6 3"));
//    }
//
//    public function test_1_3_2_4_5_safe() {
//        $this->assertSame(1, $this->solution->countSafeReportsWithTolerance("1 3 2 4 5"));
//    }
//
//    public function test_1_2_7_8_9_unsafe() {
//        $this->assertSame(0, $this->solution->countSafeReportsWithTolerance("1 2 7 8 9"));
//    }
//
//    public function test_9_7_6_2_1_unsafe() {
//        $this->assertSame(0, $this->solution->countSafeReportsWithTolerance("9 7 6 2 1"));
//    }
//
//    public function test_8_6_4_4_1_safe() {
//        $this->assertSame(1, $this->solution->countSafeReportsWithTolerance("8 6 4 4 1"));
//    }
//
//    public function test_4_3_5_6_8_10_13_13_safe() {
//        $this->assertSame(0, $this->solution->countSafeReportsWithTolerance("4 3 5 6 8 10 13 13"));
//    }
//
//    public function test_puzzle_input() {
//        $input = file_get_contents(__DIR__ . "/input.txt");
//
//        $this->assertSame(352, $this->solution->countSafeReportsWithTolerance($input));
//    }
//
//}
