<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\OrdersPageController;
use App\Http\Controllers\WarehousesPageController;
use Illuminate\Support\Facades\Route;

// Главная
Route::get('/', [MainPageController::class, 'getPage'])->name('mainPage');

// Склады
Route::get('/warehouses', [WarehousesPageController::class, 'getWarehousesPage'])->name('warehousesPage');
Route::get('/warehouse/stock/{id}', [WarehousesPageController::class, 'getStockPage'])->name('warehouseStockPage');

// Заказы
Route::get('/orders', [OrdersPageController::class, 'getOrdersPage'])->name('ordersPage');
Route::get('/order/{id}', [OrdersPageController::class, 'getOrderPage'])->name('orderPage');
