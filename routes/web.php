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
//            dd($url_generator->getIndexUrl());
            Route::get($url_generator->getIndexPath(), [Lardmin::class, 'index']);
            Route::get($url_generator->getCreatePath(), [Lardmin::class, 'create']);
        }
    }

});

