<?php

namespace Datalogix\Charts\Http\Controllers;

use Datalogix\Charts\Contracts\Chartable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChartsController extends Controller
{
    public function __invoke(Request $request, Chartable $chart)
    {
        return $chart->handler($request);
    }
}
