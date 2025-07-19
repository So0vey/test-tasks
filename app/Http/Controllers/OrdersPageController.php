<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersPageController extends Controller
{
    /**
     * Возвращает View страницы всех заказов с фильтрами и пагинацией.
     *
     * @param Request $request
     * @return View
     */
    public function getOrdersPage(Request $request): View
    {
        $orderList = Orders::when($request->status, fn($q, $status) => $q->where('status', $status))
            ->when($request->warehouse_id, fn($q, $warehouseId) => $q->where('warehouse_id', $warehouseId))
            ->orderBy($request->sortBy ?? 'id', $request->sortType ?? 'asc')
            ->with('warehouse')
            ->simplePaginate(5);

        $warehousesList = Warehouse::all();

        return view('pages.orders.ordersPage', compact('orderList', 'warehousesList'));
    }

    public function getOrderPage(Request $request): View
    {
        return view('pages.orders.orderPage');
    }
}
