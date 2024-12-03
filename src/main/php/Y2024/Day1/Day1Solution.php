<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day1;

class Day1Solution {

    public function getDelta(string $input): int {
        $sum = 0;
        [$leftList, $rightList] = $this->getSortedLists($input);
        foreach ($leftList as $index => $left) {
            $sum += abs(intval($rightList[$index]) - intval($left));
        }

        return $sum;
    }

    public function getSimilarityScore(string $input): int {
        $sum = 0;
        [$leftList, $rightList] = $this->getSortedLists($input);
        $rightValueCounts = array_count_values($rightList);
        foreach ($leftList as $left) {
            $multiplicand = $rightValueCounts[$left] ?? 0;
            $sum += intval($left) * $multiplicand;
        }

        return $sum;
    }

    private function getSortedLists(string $input): array {
        $leftList = [];
        $rightList = [];
        $rows = explode("\n", $input);
        foreach ($rows as $row) {
            [$left, $right] = explode("   ", $row);
            $leftList[] = $left;
            $rightList[] = $right;
        }
        sort($leftList);
        sort($rightList);
        return [$leftList, $rightList];
    }

}