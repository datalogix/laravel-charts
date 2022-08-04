<?php

namespace Datalogix\Charts;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ChartsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerSingleton();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/charts.php', 'charts');
    }

    /**
     * Register singleton.
     *
     * @return void
     */
    protected function registerSingleton()
    {
        $this->app->singleton(Registrar::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootCommands();
        $this->bootDirectives();
        $this->bootPublishing();
        $this->bootRoutes();
    }

    /**
     * Bootstrap commands.
     *
     * @return void
     */
    protected function bootCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([Commands\CreateChart::class]);
        }
    }

    /**
     * Bootstrap directives.
     *
     * @return void
     */
    protected function bootDirectives()
    {
        $namePrefix = Str::of(config('charts.name_prefix', 'charts'))
            ->snake('.')
            ->trim('.')
            ->whenNotEmpty(function ($value) {
                return $value->append('.');
            });

        Blade::directive('chart', function ($expression) use ($namePrefix) {
            return "<?php echo route('{$namePrefix}'{$expression}); ?>";
        });
    }

    /**
     * Bootstrap publishing.
     *
     * @return void
     */
    protected function bootPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config/charts.php' => config_path('charts.php')], 'charts');
        }
    }

    /**
     * Bootstrap routes.
     *
     * @return void
     */
    protected function bootRoutes()
    {
        if (config('charts.autoregister', true)) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }
    }
}
