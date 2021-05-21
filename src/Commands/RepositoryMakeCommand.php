<?php

namespace haipham22\LarRepository\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryMakeCommand extends GeneratorCommand
{
    protected $name = 'make:repository';

    protected $type = 'repository.';

    protected $description = 'Create a new repository class';

    protected function getStub()
    {
        return __DIR__ . '/stubs/repository.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }

    protected function alreadyExists($rawName)
    {
        return class_exists($this->rootNamespace().'Repositories\\'.$rawName);
    }
}
