<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day3;

use Throwable;

class Day3Solution {
    public function multiply(string $input): int {
        $sum = 0;
        preg_match_all("/mul\(\d{1,3},\d{1,3}\)/", $input, $matches);
        foreach ($matches[0] as $mul) {
            $numbers = str_replace(["mul(", ")"], "", $mul);
            $digits = explode(",", $numbers);

            try {
                $result = $digits[0] * $digits[1];
                $sum += $result;
            } catch(Throwable $_) {
            }
        }

        return $sum;
    }

}