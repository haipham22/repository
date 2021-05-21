<?php


namespace haipham22\LarRepository\Providers;

use haipham22\LarRepository\Commands\RepositoryMakeCommand;
use haipham22\LarRepository\Commands\ServiceMakeCommand;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $commands = [
        ServiceMakeCommand::class,
        RepositoryMakeCommand::class,
    ];

    public function boot()
    {
        $path = $this->packagePath('config/repository.php');
        $this->mergeConfigFrom(
            $path, 'repository.'
        );
        $this->publishes([
            $path => config_path('repository..php')
        ], 'config');
    }

    private function packagePath(string $path): string
    {
        return __DIR__ . '/../../' . $path;
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }
}
