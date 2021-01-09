<?php

namespace Ctrlv\Lardmin\Tests;

use Ctrlv\Lardmin\Generators\BreadcrumbGenerator;
use Ctrlv\Lardmin\Generators\MenuGenerator;
use Ctrlv\Lardmin\Generators\UrlGenerator;
use Ctrlv\Lardmin\ModelMonitor\ListModelMonitor;
use Ctrlv\Lardmin\ModelMonitor\ModelMonitor;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class ServiceProviderTest extends TestCase {

    public function testConfigLoaded()
    {
        $this->assertTrue(Config::has('lardmin.version'));
    }

    public function testPropertyMonitorRegistered()
    {
        $list_monitor = $this->app->make(ListModelMonitor::class);
        $this->assertInstanceOf(ModelMonitor::class, $list_monitor);
    }

    public function testGeneratorsRegistered()
    {
        $url_generator = $this->app->make(UrlGenerator::class);
        $this->assertInstanceOf(UrlGenerator::class, $url_generator);

        $menu_generator = $this->app->make(MenuGenerator::class);
        $menu_generator_2 = $this->app->make(MenuGenerator::class);
        $this->assertTrue($menu_generator === $menu_generator_2);

        $breadcrumb_generator = $this->app->make(BreadcrumbGenerator::class);
        $this->assertInstanceOf(BreadcrumbGenerator::class, $breadcrumb_generator);
    }

    public function testViewsBooted()
    {
        $this->assertTrue(View::exists("lardmin::layout"));
        $this->assertTrue(View::exists("lardmin::layout.logo"));
        $this->assertTrue(View::exists("lardmin::layout.logo"));
        $this->assertTrue(View::exists("lardmin::layout.left-menu"));
        $this->assertTrue(View::exists("lardmin::layout.main-content-heading"));
    }
}
