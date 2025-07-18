<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersPageController extends Controller
{
    public function getPage(): View
    {
//        $warehousesList = Warehouse::select(['id', 'name', 'created_at'])
//            ->orderBy('id')
//            ->simplePaginate(5);

        return view('pages.orders.ordersPage', [
//            'warehousesList' => $warehousesList
        ]);
    }
}
