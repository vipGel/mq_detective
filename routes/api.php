<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\MQAddressController;
use App\Http\Controllers\MQGenreController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'api'], function () {

    Route::post('login', [Login::class, 'login']);


    Route::get('genres', [MQGenreController::class, 'genres']);
    Route::get('addresses/{genre_id}', [MQAddressController::class, 'addresses']);
    Route::get('address_letters/{genre_id}', [MQAddressController::class, 'addressLetters']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('address/{genre_id}', [MQAddressController::class, 'address']);
    });
});
