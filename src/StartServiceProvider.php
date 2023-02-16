<?php

namespace Laravel\Start;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class StartServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'start');
        $this->runCommand();
        $this->mountComponents();
        $this->livewireMerge();
    }
    public function register()
    {
    }
    public function mountComponents()
    {
        Blade::componentNamespace("App\View\Components\Atoms", 'atoms');
        Blade::componentNamespace("App\View\Components\Molecules", 'molecules');
        Blade::componentNamespace("App\View\Components\Organisms", 'organisms');
        Blade::componentNamespace("App\View\Components\Templates", 'templates');
    }
    public function livewireMerge(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/start.php', 'start');
        config(config('start'));
    }
    public function runCommand()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }
}
