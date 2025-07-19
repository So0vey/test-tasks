<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function movements()
    {
        return $this->hasMany(StockMovement::class);
    }

    // Штука по идее должна автоматически изменять заказы без того, чтобы вручную изменять их через контроллер
//    protected static function booted()
//    {
//        static::updated(function ($stock) {
//            if ($stock->isDirty('stock')) {
//                $change = $stock->stock - $stock->getOriginal('stock');
//
//                StockMovement::create([
//                    'stock_id' => $stock->id,
//                    'product_id' => $stock->product_id,
//                    'warehouse_id' => $stock->warehouse_id,
//                    'quantity_change' => $change,
//                    'movement_type' => 'Регулирование',
//                    'user_id' => auth()->id(),
//                    'notes' => 'Автоматическое регулирование'
//                ]);
//            }
//        });
//    }
}
