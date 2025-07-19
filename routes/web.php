<?php

use App\Http\Controllers\MainPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrdersPageController;
use App\Http\Controllers\StockMovementPageController;
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

// Работа со статусами заказов
Route::post('/orders', [OrderController::class, 'store'])->name('storeOrder');
Route::put('orders/{id}/complete', [OrderController::class, 'complete'])->name('completeOrder');
Route::put('orders/{id}/cancel', [OrderController::class, 'cancel'])->name('cancelOrder');
Route::put('orders/{id}/update', [OrderController::class, 'update'])->name('updateOrder');
Route::put('orders/{id}/resume', [OrderController::class, 'resume'])->name('resumeOrder');

// История движения
Route::get('/stock-movements', [StockMovementPageController::class, 'getPage'])->name('stockMovementsPage');
