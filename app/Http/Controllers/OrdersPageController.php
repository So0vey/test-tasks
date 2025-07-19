<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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
        $orderList = Order::when($request->status, fn($q, $status) => $q->where('status', $status))
            ->when($request->warehouse_id, fn($q, $warehouseId) => $q->where('warehouse_id', $warehouseId))
            ->orderBy($request->sortBy ?? 'id', $request->sortType ?? 'asc')
            ->with('warehouse')
            ->simplePaginate(5);

        $warehousesList = Warehouse::all();

        return view('pages.orders.ordersPage', compact('orderList', 'warehousesList'));
    }

    /**
     * Возвращает View страницы содержимого конкретного заказа с пагинацией.
     *
     * @param Request $request
     * @return View
     */
    public function getOrderPage(Request $request): View
    {
        $order = Order::find($request->id);
        $orderItems = $order->items()
            ->with('product')
            ->paginate(10);

        return view('pages.orders.orderPage', compact('order', 'orderItems'));
    }
}
