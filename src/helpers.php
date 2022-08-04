<?php

if (! function_exists('charts_path')) {
    /**
     * Get the path to the charts folder.
     *
     * @param  string  $path
     * @return string
     */
    function charts_path($path = '')
    {
        return app_path(config('charts.namespace', 'Charts').($path ? DIRECTORY_SEPARATOR.$path : $path));
    }
}
