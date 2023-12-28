<?php

use Azhar25git\AzharPackage\Controllers\BookController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['web']], function () {
    Route::resource('books', BookController::class);
});