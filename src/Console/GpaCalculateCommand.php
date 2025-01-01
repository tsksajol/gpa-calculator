<?php

namespace Sajolkk\GpaCalculator\Console;

use Illuminate\Console\Command;

class GpaCalculateCommand extends Command
{
    // The name and signature of the console command
    protected $signature = 'gpa:calculate {grades*} {credits*}';

    // The console command description
    protected $description = 'Calculate GPA based on grades and credits';

    public function handle()
    {
        $grades = $this->argument('grades');
        $credits = $this->argument('credits');

        if (count($grades) !== count($credits)) {
            $this->error('The number of grades and credits must be the same.');
            return;
        }

        $subjects = [];
        for ($i = 0; $i < count($grades); $i++) {
            $subjects[] = [
                'grade' => (float) $grades[$i],
                'credits' => (int) $credits[$i],
            ];
        }

        $calculator = app('gpa-calculator');
        $gpa = $calculator->calculate($subjects);

        $this->info("Your GPA is: $gpa");
    }
}
