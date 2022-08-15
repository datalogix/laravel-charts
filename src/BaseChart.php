<?php

namespace Datalogix\Charts;

use Datalogix\Charts\Contracts\Chartable;
use Illuminate\Http\Request;
use ReflectionClass;

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

    public static function __set_state(array $properties)
    {
        $klass = new static();

        $refClass = new ReflectionClass($klass);

        foreach ($properties as $name => $value) {
            $property = $refClass->getProperty($name);
            $property->setAccessible(true);

            $property->setValue($klass, $value);
        }

        return $klass;
    }
}
