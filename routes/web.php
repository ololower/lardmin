<?php

use Illuminate\Support\Facades\Route;
use \Ctrlv\Lardmin\Http\Controllers\Lardmin;

Route::prefix(config('lardmin.admin_url_prefix'))
    ->middleware('web') // Todo:: группа роутов для админ панельки
    ->group(function () {

    /**
     * Обычные CRUD роуты
     */
    foreach (config('lardmin.nav_menu_items') as $nav_menu_item) {
        if (isset($nav_menu_item['model'])) {
            $url_path = str_replace("\\", "_", strtolower($nav_menu_item['model']));
            Route::get($url_path, [Lardmin::class, 'index']);
        }
    }

});

