<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day3;

use Throwable;

class Day3Solution {

    public function multiply(string $input): int {
        $sum = 0;
        foreach ($this->getMuls($input) as $mul) {
            $sum += $this->getResultOfMul($mul);
        }

        return $sum;
    }

    private function getMuls(string $input): array {
        preg_match_all($this->detectMul(), $input, $matches);
        return $matches[0];
    }

    private function detectMul(): string {
        return "/mul\(\d{1,3},\d{1,3}\)/"; // matches "mul(1-3 digits,1-3 digits)"
    }

    private function getResultOfMul(string $mul): int {
        $numbers = str_replace(["mul(", ")"], "", $mul);
        $digits = explode(",", $numbers);

        try {
            return $digits[0] * $digits[1];
        }
        catch (Throwable $_) {
            return 0;
        }
    }

}