# Laravel Charts

[![Latest Stable Version](https://poser.pugx.org/datalogix/laravel-charts/version)](https://packagist.org/packages/datalogix/laravel-charts)
[![Total Downloads](https://poser.pugx.org/datalogix/laravel-charts/downloads)](https://packagist.org/packages/datalogix/laravel-charts)
[![tests](https://github.com/datalogix/laravel-charts/workflows/tests/badge.svg)](https://github.com/datalogix/laravel-charts/actions)
[![StyleCI](https://github.styleci.io/repos/521346347/shield?style=flat)](https://github.styleci.io/repos/521346347)
[![codecov](https://codecov.io/gh/datalogix/laravel-charts/branch/main/graph/badge.svg)](https://codecov.io/gh/datalogix/laravel-charts)
[![License](https://poser.pugx.org/datalogix/laravel-charts/license)](https://packagist.org/packages/datalogix/laravel-charts)

> Laravel charts is a package to simplify the use of charts.

## Features

- Autoregister your charts
- Customize routing, middleware and prefix to your charts
- Command to create a new chart `php artisan make:chart ChartName`

## Installation

You can install the package via composer:

```bash
composer require datalogix/laravel-charts
```

The package will automatically register itself.

## Configuration

The defaults are set in `config/charts.php`. Copy this file to your own config directory to modify the values. You can publish the config using this command:

```bash
php artisan vendor:publish --provider="Datalogix\Charts\ChartsServiceProvider" --tag="config"
```

## Commands

You can start creating charts with the typical `make` command by laravel artisan.

```
php artisan make:chart SampleChart
```

This will create a `SampleChart` class under `App\Charts` namespace.


## Render Charts

Laravel charts can be used without any rendering on the PHP side. Meaning it can be used and server as an API endpoint. There's no need to modify the configuration files or the chart to do such.

However, if you do not plan to develop the front-end as a SPA or in a different application and can use the
laravel Blade syntax, you can then use the `@chart` helper to create charts.

The `@chart` blade helper does accept a string containing the
chart name to get the URL of. The following example can be used as a guide:

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Charts example</title>
  </head>
  <body>
    <!-- Chart container -->
    <div id="chart" style="height: 300px;"></div>
    <!-- Chart library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
      });
    </script>
  </body>
</html>
```
