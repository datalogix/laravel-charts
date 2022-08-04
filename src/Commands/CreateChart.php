<?php

namespace Datalogix\Charts\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class CreateChart extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:chart {name : Determines the chart name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new chart class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Chart';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/chart.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return Str::of(config('charts.namespace', 'Charts'))
            ->trim('\\')
            ->prepend($rootNamespace, '\\');
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return Str::of($this->argument('name'))
            ->trim()
            ->camel()
            ->ucfirst();
    }
}
