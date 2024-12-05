<?php declare(strict_types = 1);

namespace AdventOfCode\Y2024\Day2;

class Day2Solution {

    public function countSafeReportsWithTolerance(string $input): int {
        return $this->countSafeReports($input);
    }

    public function countSafeReportsStrict(string $input): int {
        return $this->countSafeReports($input);
    }

    private function countSafeReports(string $input): int {
        $numberOfSafeReports = 0;
        $rows = explode("\n", $input);
        foreach ($rows as $row) {
            $safeReports = $this->isLevelSafe($row);
            if($safeReports) {
                $numberOfSafeReports++;
            }
        }
        return $numberOfSafeReports;
    }

    private function isLevelSafe(string $input): bool {
        $levels = $this->getLevelsAsIntegers($input);
        $safeReports = false;
        $direction = "";
        for ($i = 0; $i < count($levels); $i++) {
            $currentLevel = $levels[$i];
            if (!isset($levels[$i + 1])) {
                break;
            }
            $nextLevel = $levels[$i + 1];
            $delta = $currentLevel - $nextLevel;
            if (empty($direction)) {
                $direction = $this->getDirection($delta);
            }
            if ($delta !== 0 && $delta > -4 && $delta < 4 && $direction === $this->getDirection($delta)) {
                $safeReports = true;
            } else {
                $safeReports = false;
                break;
            }
        }
        return $safeReports;
    }

    private function getLevelsAsIntegers(string $input): array {
        return array_map(function ($level) {
            return intval($level);
        }, explode(" ", $input));
    }

    private function getDirection(mixed $delta): string {
        return $delta < 0 ? "+" : "-";
    }

}