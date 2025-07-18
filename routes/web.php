<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\WarehousesPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'getPage'])->name('mainPage');
Route::get('/warehouses', [WarehousesPageController::class, 'getPage'])->name('warehousesPage');
