<?php

namespace Tests;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        if (env('START_CHROMEDRIVER')) {
            static::startChromeDriver();
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        if (env('START_CHROMEDRIVER')) {
            $driver = DesiredCapabilities::chrome();
        } else {
            $driver = DesiredCapabilities::phantomjs();
        }
        return RemoteWebDriver::create(
            'http://localhost:9515', $driver
        );
    }
}
