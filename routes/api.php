<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAccess;
use Illuminate\Support\Facades\Route;

Route::apiResource('/books', BookController::class);

Route::apiResource('/user', UserController::class);

Route::apiResource('/rentals', RentalsController::class);

Route::post('/rentals/book', [RentalsController::class, 'book'])
    // ->middleware(AuthAccess::class)
;

Route::post('/rentals/return/{rentals}', [RentalsController::class, 'bookAvaible'])
    // ->middleware(AuthAccess::class)
;

