<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day3;

use Throwable;

class Day3Solution {

    public function multiplyEnabled(string $input): int {
        return $this->multiply($input, true);
    }

    public function multiplyAll(string $input): int {
        return $this->multiply($input, false);
    }

    private function multiply(string $input, bool $respectDos): int {
        $sum = 0;
        $enabled = true;
        foreach ($this->getMuls($input, $respectDos) as $mul) {
            if($mul === "don't()") {
                $enabled = false;
            }
            if($mul === "do()") {
                $enabled = true;
            }
            if($enabled) {
                $sum += $this->getResultOfMul($mul);
            }
        }

        return $sum;
    }

    private function getMuls(string $input, bool $respectDos): array {
        if($respectDos) {
            $detectMul = $this->detectMulWithDos();
        } else {
            $detectMul = $this->detectMul();
        }
        preg_match_all($detectMul, $input, $matches);
        return $matches[0];
    }

    private function detectMulWithDos(): string {
        return "/(mul\(\d{1,3},\d{1,3}\))|(don\'t\(\))|(do\(\))/"; // matches "mul(1-3 digits,1-3 digits)"
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