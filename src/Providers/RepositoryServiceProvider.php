<?php


namespace haipham22\Repository\Providers;

use haipham22\Repository\Commands\RepositoryMakeCommand;
use haipham22\Repository\Commands\ServiceMakeCommand;
use haipham22\Repository\Repositories\AbstractRepository;

class RepositoryServiceProvider extends \Torann\LaravelRepository\RepositoryServiceProvider
{

    protected $commands = [
        ServiceMakeCommand::class,
        RepositoryMakeCommand::class,
    ];

    public function boot()
    {
        $path = $this->packagePath('config/repositories.php');
        $this->mergeConfigFrom(
            $path, 'repositories'
        );
        $this->publishes([
            $path => config_path('repositories.php')
        ], 'config');

        AbstractRepository::setCacheInstance($this->app['cache']);
    }

    private function packagePath(string $path): string
    {
        return __DIR__ . '/../../' . $path;
    }

    public function register()
    {
        parent::register();
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }
}
