<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('first');
})->name('welcome');
Route::get('/ss', function () {
    return view('second');
})->name('ss');
Route::get('/sss', [AdminController::class, 'test'])->name('sss');
