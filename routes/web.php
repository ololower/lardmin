<?php

use Illuminate\Support\Facades\Route;
use Ctrlv\Lardmin\Http\Controllers\User\LardminUser;

Route::get('/test', [LardminUser::class, 'index']);

//Route::get('/lardmin', \Ctrlv\Lardmin\Http\Controllers\LardminUserController::class, 'index');
