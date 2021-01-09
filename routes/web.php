<?php

use Illuminate\Support\Facades\Route;
use \Ctrlv\Lardmin\Http\Controllers\Lardmin;
use \Ctrlv\Lardmin\Generators\UrlGenerator;

Route::prefix(config('lardmin.admin_url_prefix'))
    ->middleware('web') // Todo:: группа миддлваров для админ панельки
    ->group(function () {

    /**
     * Обычные CRUD роуты
     */
    foreach (config('lardmin.nav_menu_items') as $nav_menu_item) {
        if (isset($nav_menu_item['model'])) {
            $url_generator = UrlGenerator::getInstanceFromClassname($nav_menu_item['model']);
            Route::get($url_generator->getIndexPath(), [Lardmin::class, 'index']);
            Route::get($url_generator->getCreatePath(), [Lardmin::class, 'create']);
            Route::get($url_generator->getShowPath(), [Lardmin::class, 'show']);
            Route::post($url_generator->getStorePath(), [Lardmin::class, 'store']);
            Route::post($url_generator->getEditPath(), [Lardmin::class, 'edit']);
        }
    }

    Route::get('login', function () {
        return view('lardmin::auth.login');
    });

    Route::get('register', function () {
        return view('lardmin::auth.register');
    });

    Route::get('reset', function () {
        return view('lardmin::auth.login');
    });
});

