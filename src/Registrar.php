<?php

namespace Datalogix\Charts;

use Datalogix\Charts\Http\Controllers\ChartsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Registrar
{
    /**
     * Registers new charts into the application.
     *
     * @param array $charts
     * @return void
     */
    public function register(array $charts)
    {
        $namePrefix = Str::of(config('charts.name_prefix', 'charts'))
            ->snake('.')
            ->trim('.')
            ->whenNotEmpty(function ($value) {
                return $value->append('.');
            });

        $namespace = Str::of(app()->getNamespace())
            ->trim('\\')
            ->append('\\', config('charts.namespace', 'Charts'), '\\');

        Route::group([
            'prefix' => config('charts.prefix', 'api/chart'),
            'middleware' => config('charts.middleware', ['web']),
            'as' => $namePrefix
        ], function () use ($charts, $namespace) {
            foreach ($charts as $chartClass) {
                $className = Str::of($chartClass)->after($namespace);
                $chart = app($chartClass);
                $name = $chart->name ?? Str::snake(class_basename($chartClass));
                $prefix = Str::of($chart->prefix ?? $className->before(class_basename($chartClass))->lower());
                $routeName = $chart->routeName ?? $className->snake()->replace('\\_', '.');

                Route::middleware($chart->middleware ?? [])
                    ->name($routeName)
                    ->get($prefix->trim('\\/').'/'.$name, ChartsController::class)
                    ->defaults('chart', $chart);
            }
        });
    }
}
