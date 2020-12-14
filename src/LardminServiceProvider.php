<?php

namespace Ctrlv\Lardmin;

use Ctrlv\Lardmin\ContentBuilder\ContentBuilderDirector;
use \Illuminate\Support\ServiceProvider;

class LardminServiceProvider extends ServiceProvider {

    const CONFIG_PATH = __DIR__ . "/../config/lardmin.php";

    const ROUTES_PATHS = [
        __DIR__ . "/../routes/web.php",
//        __DIR__ . "/../routes/api.php",
    ];

    const VIEWS_DIR = __DIR__ . "/../resources/views";


    private function configPath() {
        return __DIR__ . "/../config/lardmin.php";
    }


    public function register()
    {
        // Строитель контента для админ панельки
//        $this->app->bind(ContentBuilderDirector::class, function ($app) {
//            return new ContentBuilderDirector();
//        });

        $this->mergeConfigFrom(self::CONFIG_PATH, 'lardmin');
    }

    public function boot() {
        $this->publishes([
            self::CONFIG_PATH => config_path('lardmin.php'),
        ], 'config');

        foreach (self::ROUTES_PATHS as $route) {
            $this->loadRoutesFrom($route);
        }

        $this->loadViewsFrom(self::VIEWS_DIR, "lardmin");

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('lardmin'),
        ], 'assets');
    }
}
