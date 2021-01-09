<?php

namespace Ctrlv\Lardmin;

use Ctrlv\Lardmin\Generators\BreadcrumbGenerator;
use Ctrlv\Lardmin\Generators\MenuGenerator;
use Ctrlv\Lardmin\Generators\UrlGenerator;
use Ctrlv\Lardmin\ModelMonitor\ListModelMonitor;
use \Illuminate\Support\ServiceProvider;

class LardminServiceProvider extends ServiceProvider {

    const CONFIG_PATH = __DIR__ . "/../config/lardmin.php";

    const ROUTES_PATHS = [
        __DIR__ . "/../routes/web.php"
    ];

    const VIEWS_DIR = __DIR__ . "/../resources/views";



    public function register()
    {

        $this->app->bind(ListModelMonitor::class, function ($app) {
            return new ListModelMonitor();
        });

        $this->mergeConfigFrom(self::CONFIG_PATH, 'lardmin');
    }

    public function boot() {

        $this->bootGenerators();
        $this->bootPublishes();
        $this->bootRoutes();
        $this->bootViews();
    }


    private function bootGenerators() {

        // Генератор меню
        $this->app->singleton(MenuGenerator::class, function () {
            return new MenuGenerator();
        });

        // Генератор url
        $this->app->bind(UrlGenerator::class, function ($app) {
            return new UrlGenerator($app->request->route()->uri ?? null);
        });

        // Генератор хлебных крошек
        $this->app->bind(BreadcrumbGenerator::class, function ($app) {
            return new BreadcrumbGenerator($app->make(UrlGenerator::class), $app->make(MenuGenerator::class));
        });
    }

    private function bootPublishes() {
        $this->publishes([
            self::CONFIG_PATH => config_path('lardmin.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('lardmin'),
        ], 'assets');
    }

    private function bootRoutes() {
        foreach (self::ROUTES_PATHS as $route) {
            $this->loadRoutesFrom($route);
        }
    }

    private function bootViews() {
        $this->loadViewsFrom(self::VIEWS_DIR, "lardmin");
    }
}
