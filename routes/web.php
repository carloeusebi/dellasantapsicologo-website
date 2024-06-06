<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/chi-sono', HomeController::class)->name('chi-sono');
Route::get('/cosa-aspettarsi', HomeController::class)->name('cosa-aspettarsi');
Route::get('/di-cosa-mi-occupo', HomeController::class)->name('di-cosa-mi-occupo');
Route::get('/contatti', HomeController::class)->name('contatti');
