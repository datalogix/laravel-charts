<?php

namespace Datalogix\Charts\Tests;

use Illuminate\Support\Facades\File;

class MakeChartCommandTest extends TestCase
{
    public function testCreateNewChartClass()
    {
        $sampleChartClasss = charts_path('SampleChart.php');

        File::delete($sampleChartClasss);

        $this->artisan('make:chart SampleChart');

        $this->assertTrue(File::exists($sampleChartClasss));

        File::delete($sampleChartClasss);
    }
}
