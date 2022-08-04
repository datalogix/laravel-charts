<?php

use Composer\Autoload\ClassMapGenerator;
use Datalogix\Charts\Registrar;
use Illuminate\Support\Facades\File;

if (File::isDirectory($path = charts_path())) {
    $charts = array_keys(ClassMapGenerator::createMap($path));

    app(Registrar::class)->register($charts);
}
