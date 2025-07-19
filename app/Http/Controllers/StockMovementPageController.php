<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockMovementPageController extends Controller
{
    public function getPage(Request $request): View
    {
        $movements = StockMovement::query()
            ->with(['product', 'warehouse', 'order'])
            ->when($request->warehouse_id, function($q, $warehouseId) {return $q->where('warehouse_id', $warehouseId);})
            ->when($request->product_id, function($q, $productId) {return $q->where('product_id', $productId);})
            ->when($request->date_from, function($query, $date) {return $query->where('created_at', '>=', $date);})
            ->when($request->date_to, function($q, $date) {return $q->where('created_at', '<=', $date);})
            ->when($request->movement_type, function($q, $type) {return $q->where('movement_type', $type);})
            ->orderBy('created_at', 'desc')
            ->simplePaginate($request->per_page ?? 15);

        $warehouses = Warehouse::all();
        $products = Product::all();

        return view('pages.stockMovement.stocksMovementsPage', compact('movements', 'products', 'warehouses'));
    }
}
