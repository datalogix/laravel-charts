<?php

use Composer\Autoload\ClassMapGenerator;
use Datalogix\Charts\Registrar;

$path = app_path(config('charts.namespace', 'Charts'));
$charts = array_keys(ClassMapGenerator::createMap($path));

app(Registrar::class)->register($charts);
