<?php

namespace Datalogix\Charts;

use Datalogix\Charts\Contracts\Chartable;
use Illuminate\Http\Request;

abstract class BaseChart implements Chartable
{
    /**
     * @var string
     */
    public $name = null;

    /**
     * @var string
     */
    public $routeName = null;

    /**
     * @var string
     */
    public $prefix = null;

    /**
     * @var array
     */
    public $middleware = [];

    /**
     * Handles the HTTP request of the chart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Datalogix\Charts\Chart
     */
    abstract public function handler(Request $request);
}
