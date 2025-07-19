<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WarehousesPageController extends Controller
{
    /**
     * Возвращает View со списком всех складов с пагинацией.
     *
     * @return View
     */
    public function getWarehousesPage(): View
    {
        $warehousesList = Warehouse::orderBy('id')
            ->simplePaginate(5);

        return view('pages.warehouses.warehousesPage', compact('warehousesList'));
    }

    /**
     * Возвращает View со списком остатков с пагинацией.
     *
     * @param Request $request
     * @return View
     */
    public function getStockPage(Request $request): View
    {
        $warehouse = Warehouse::findOrFail($request->id);
        $warehouseStocks = $warehouse->stocks()
            ->with('product')
            ->paginate(10);

        return view('pages.warehouses.warehouseStockPage', compact('warehouse', 'warehouseStocks'));
    }
}
