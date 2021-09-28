<?php

namespace haipham22\Repository\Commands;

use Illuminate\Console\GeneratorCommand;

class ServiceMakeCommand extends GeneratorCommand
{
    protected $name = 'make:service';

    protected $type = 'Service';

    protected $description = 'Create a new service class';

    protected function getStub()
    {
        return __DIR__ . '/stubs/service.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }

    protected function alreadyExists($rawName)
    {
        return class_exists($this->rootNamespace().'Services\\'.$rawName);
    }
}
