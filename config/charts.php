<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Autoregister
    |--------------------------------------------------------------------------
    |
    | This option will register the charts that are in 'App/Charts' automatically.
    | This option uses the namespace option to find the charts. You can disable
    | it and register charts manually in 'App\Providers\RouteServiceProvider'. Ex:
    |
    | $this->routes(function (\Datalogix\Charts\Registrar $charts) {
    |     $charts->register([
    |         \App\Charts\Example::class
    |     ]);
    | });
    |
    */

    'autoregister' => true,

    /*
    |--------------------------------------------------------------------------
    | Namespace
    |--------------------------------------------------------------------------
    |
    | This option allows to modify the namespace used by all the charts.
    | It will be applied to each and every chart created by the library.
    | This option comes with the default value of: 'Charts'. Charts are located in 'App/Charts'.
    |
    */

    'namespace' => 'Charts',

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | This option allows to modify the prefix used by all the chart routes.
    | It will be applied to each and every chart created by the library. This
    | option comes with the default value of: 'api/chart'. You can still define
    | a specific route prefix to each individual chart that will be applied after this.
    |
    */

    'prefix' => 'api/chart',

    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | This option allows to apply a list of middleware to each and every
    | chart created. This is commonly used if all your charts share some
    | logic. For example, you might have all your charts under authentication
    | middleware. If that's the case, applying a global middleware is a good
    | choice rather than applying it individually to each chart.
    |
    */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Route Name Prefix
    |--------------------------------------------------------------------------
    |
    | This option allows to modify the prefix used by all the chart route names.
    | This is mostly used if there's the need to modify the route names that are
    | binded to the charts.
    |
    */

    'name_prefix' => 'charts',
];
