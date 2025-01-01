<?php

namespace Sajolkk\GpaCalculator;

use Illuminate\Support\ServiceProvider;
use Sajolkk\GpaCalculator\Console\GpaCalculateCommand;

class GpaCalculatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('gpa-calculator', function () {
            return new GpaCalculator();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GpaCalculateCommand::class,
            ]);
        }
    }
}
