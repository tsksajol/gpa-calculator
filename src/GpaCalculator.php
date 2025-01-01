<?php

namespace Sajolkk\GpaCalculator;

class GpaCalculator
{
    public function calculate(array $subjects): float
    {
        $totalCredits = 0;
        $weightedGradePoints = 0;

        foreach ($subjects as $subject) {
            $grade = $subject['grade'];
            $credits = $subject['credits'];

            $totalCredits += $credits;
            $weightedGradePoints += $grade * $credits;
        }

        return $totalCredits ? round($weightedGradePoints / $totalCredits, 2) : 0;
    }
}
