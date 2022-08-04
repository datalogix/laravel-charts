<?php

namespace Datalogix\Charts;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class Chart implements Arrayable, Jsonable, Responsable
{
    /**
     * @var string[]
     */
    public $labels = [];

    /**
     * @var array|null
     */
    public $extra = null;

    /**
     * @var array
     */
    public $datasets = [];

    /**
     * Creates a new instance of a chart.
     *
     * @return \Datalogix\Charts\Chart
     */
    public static function build()
    {
        return new Chart();
    }

    /**
     * Sets the chart labels.
     *
     * @param  string[]  $labels
     * @return \Datalogix\Charts\Chart
     */
    public function labels(array $labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * Adds extra information to the chart.
     *
     * @param  array  $extra
     * @return \Datalogix\Charts\Chart
     */
    public function extra(array $extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Dataset adds a new simple dataset to the chart. If more advanced control is
     * needed, consider using `AdvancedDataset` instead.
     *
     * @param  string  $name
     * @param  array  $values
     * @return \Datalogix\Charts\Chart
     */
    public function dataset($name, $values)
    {
        return $this->advancedDataset($name, $values);
    }

    /**
     * AdvancedDataset appends a new dataset to the chart or modifies an existing one.
     * If the ID has already been used, the dataset will be replaced with this one.
     *
     * @param  string  $name
     * @param  array  $values
     * @param  array|null  $extra
     * @return \Datalogix\Charts\Chart
     */
    public function advancedDataset($name, $values, $extra = null)
    {
        $this->datasets[$name] = [
            'name' => $name,
            'values' => $values,
            'extra' => $extra
        ];

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'chart' => [
                'labels' => $this->labels,
                'extra' => $this->extra,
            ],
            'datasets' => array_values($this->datasets),
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return new JsonResponse($this->toArray());
    }
}
