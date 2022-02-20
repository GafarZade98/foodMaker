<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', [WebController::class, 'index'])->name('homepage');
//Route::get('/', [WebController::class, 'index'])->name('meals');
Route::get('/cook', [WebController::class, 'cook'])->name('cook');

Route::prefix('admin')->group(function(){
    Voyager::routes();
});



