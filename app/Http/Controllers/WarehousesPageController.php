<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WarehousesPageController extends Controller
{
    public function getPage(): View
    {
        $warehousesList = Warehouse::select(['id', 'name', 'created_at'])
            ->orderBy('id')
            ->simplePaginate(5);

        return view('pages.warehouses.warehousesPage', [
            'warehousesList' => $warehousesList
        ]);
    }

    public function getStockPage(Request $request): View
    {
        $warehouse = Warehouse::find($request->id);
        $warehouseStocks = Warehouse::find($request->id)
            ->stocks()
            ->with('product')
            ->paginate(10);

        return view('pages.warehouses.warehouseStockPage', [
            'warehouse' => $warehouse,
            'warehouseStocks' => $warehouseStocks
        ]);
    }
}
