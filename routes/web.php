<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', [WebController::class, 'index'])->name('homepage');
Route::get('/meals', [WebController::class, 'meals'])->name('meals');

Route::prefix('admin')->group(function(){
    Voyager::routes();
});



