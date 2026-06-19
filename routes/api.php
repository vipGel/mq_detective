<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\MQAddressController;
use App\Http\Controllers\MQGenreController;
use App\Http\Controllers\MQQuestionController;
use App\Http\Controllers\MQUserAnswerController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'api'], function () {

    Route::post('login', [Login::class, 'login']);
    Route::post('register', [Register::class, 'register']);
    Route::post('logout', [Logout::class, 'logout']);

    Route::get('genres', [MQGenreController::class, 'genres']);

    Route::get('questions/{case_id}', [MQQuestionController::class, 'questions']);

    Route::get('addresses/{genre_id}', [MQAddressController::class, 'addresses']);
    Route::get('address_letters/{genre_id}', [MQAddressController::class, 'addressLetters']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('address/{genre_id}', [MQAddressController::class, 'address']);

        Route::post('answer', [MQUserAnswerController::class, 'answer']);
    });
});
