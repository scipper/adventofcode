<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day1;

use PHPUnit\Framework\TestCase;

class Day1_P2Test extends TestCase {

    private Day1Solution $solution;

    public function setUp(): void {
        $this->solution = new Day1Solution();
    }

    public function test_1_1_similarity_score_1() {
        $this->assertSame(1, $this->solution->getSimilarityScore("1   1"));
    }

    public function test_2_2_similarity_score_2() {
        $this->assertSame(2, $this->solution->getSimilarityScore("2   2"));
    }

    public function test_1_2_similarity_score_0() {
        $this->assertSame(0, $this->solution->getSimilarityScore("1   2"));
    }

    public function test_sums_up_two_rows() {
        $input = <<<EOL
1   1
2   2
EOL;
        $this->assertSame(3, $this->solution->getSimilarityScore($input));
    }

    public function test_sums_up_left_value_over_multiple_right_rows() {
        $input = <<<EOL
1   1
2   1
EOL;
        $this->assertSame(2, $this->solution->getSimilarityScore($input));
    }

    public function test_puzzle_input() {
        $input = file_get_contents(__DIR__ . "/input.txt");;
        $this->assertSame(24349736, $this->solution->getSimilarityScore($input));
    }

}
