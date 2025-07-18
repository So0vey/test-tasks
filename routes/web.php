<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\WarehousesPageController;
use Illuminate\Support\Facades\Route;

// Главная
Route::get('/', [MainPageController::class, 'getPage'])->name('mainPage');

// Склады
Route::get('/warehouses', [WarehousesPageController::class, 'getPage'])->name('warehousesPage');
Route::get('/warehouse/stock/{id}', [WarehousesPageController::class, 'getStockPage'])->name('warehouseStockPage');
