<?php

namespace Datalogix\Charts\Tests;

use Datalogix\Charts\ChartsServiceProvider;
use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class TestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @return string
     */
    protected function getServiceProviderClass()
    {
        return ChartsServiceProvider::class;
    }
}
