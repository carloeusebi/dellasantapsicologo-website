<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/chi-sono', 'chi-sono')->name('chi-sono');
Route::view('/cosa-aspettarsi', 'cosa-aspettarsi')->name('cosa-aspettarsi');
Route::view('/di-cosa-mi-occupo', 'di-cosa-mi-occupo')->name('di-cosa-mi-occupo');
Route::view('/contatti', 'contatti')->name('contatti');
