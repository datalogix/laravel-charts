<?php

namespace Datalogix\Charts\Contracts;

use Illuminate\Http\Request;

interface Chartable
{
    /**
     * Handles the HTTP request of the chart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Datalogix\Charts\Chart
     */
    public function handler(Request $request);
}
