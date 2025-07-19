<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer' => 'required|string',
            'warehouse_id' => 'required|exists:warehouses,id',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.count' => 'required|integer|min:1'
        ]);

        // Проверка остатков
        foreach ($validated['items'] as $item) {
            $stock = Stock::where([
                'warehouse_id' => $validated['warehouse_id'],
                'product_id' => $item['product_id']
            ])->first();

            if (!$stock || $stock->stock < $item['count']) {
                return Redirect::back()->withErrors(['error' => 'Недостаточно товара ' . $item['product_id'] . ' на складе']);
            }
        }

        // Создание заказа
        $order = Order::create([
            'customer' => $validated['customer'],
            'warehouse_id' => $validated['warehouse_id'],
            'status' => 'active'
        ]);

        // Списание остатовк
        foreach ($validated['items'] as $item) {
            $order->items()->create([
                    'product_id' => $item['product_id'],
                    'count' => $item['count']
                ]
            );

            Stock::where([
                'warehouse_id' => $validated['warehouse_id'],
                'product_id' => $item['product_id']
            ])->decrement('stock', $item['count']);
        }

        return Redirect::route('ordersPage')->with('success', 'Заказ успешно создан');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $order = Order::find($id);

        if ($order->status !== 'active') {
            return Redirect::back()->withErrors(['error' => 'Можно обновлять только активные заказы']);
        }

        $validated = $request->validate([
            'customer' => 'sometimes|string',
            'warehouse_id' => 'sometimes|exists:warehouses,id',
            'items' => 'sometimes|array|min:1',
            'items.*.product_id' => 'required_with:items|exists:products,id',
            'items.*.count' => 'required_with:items|integer|min:1'
        ]);

        // Обновление основных данных
        $order->update($request->only(['customer', 'warehouse_id']));

        // Обновление позиций
        if ($request->has('items')) {
            // Возвращение остатков
            foreach ($order->items as $item) {
                Stock::where([
                    'warehouse_id' => $order->warehouse_id,
                    'product_id' => $item->product_id
                ])->increment('stock', $item->count);
            }

            // Удаление старые позиции
            $order->items()->delete();

            // Проверка новых остатки
            foreach ($validated['items'] as $item) {
                $stock = Stock::where([
                    'warehouse_id' => $order->warehouse_id,
                    'product_id' => $item['product_id']
                ])->first();

                if (!$stock || $stock->stock < $item['count']) {
                    // Если недостаточно - возвращаем уже возвращенные остатки
                    foreach ($validated['items'] as $processedItem) {
                        Stock::where([
                            'warehouse_id' => $order->warehouse_id,
                            'product_id' => $processedItem['product_id']
                        ])->decrement('stock', $processedItem['count']);
                    }
                    return Redirect::back()->withErrors(['error' => 'Недостаточно товара ' . $item['product_id']]);
                }
            }

            $order->update([
                'customer' => $validated['customer'],
                'warehouse_id' => $validated['warehouse_id']
            ]);

            // Добавление новых позиций и списывание
            foreach ($validated['items'] as $item) {
                $order->items()->create([
                    'product_id' => $item['product_id'],
                    'count' => $item['count']
                ]);

                Stock::where([
                    'warehouse_id' => $order->warehouse_id,
                    'product_id' => $item['product_id']
                ])->decrement('stock', $item['count']);
            }
        }

        return Redirect::route('orderPage', ['id' => $order->id])->with('success', 'Заказ успешно обновлен');
    }

    public function complete($id): RedirectResponse
    {
        $order = Order::find($id);

        if ($order->status !== 'active') {
            return Redirect::back()->withErrors(['error' => 'Можно завершать только активные заказы']);
        }

        $order->update([
            'status' => 'completed',
            'completed_at' => now()
        ]);

        return Redirect::back()->with('success', 'Заказ успешно завершен');
    }

    public function cancel($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        if ($order->status !== 'active') {
            return Redirect::back()->withErrors(['error' => 'Можно отменять только активные заказы']);
        }

        // Возывращение товаров на склад
        foreach ($order->items as $item) {
            Stock::where([
                'warehouse_id' => $order->warehouse_id,
                'product_id' => $item->product_id
            ])->increment('stock', $item->count);
        }

        $order->update(['status' => 'canceled']);
        return Redirect::back()->with('success', 'Заказ успешно отменен');
    }

    public function resume($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        if ($order->status !== 'canceled') {
            return Redirect::back()->withErrors(['error' => 'Можно возобновлять только отмененные заказы']);
        }

        // Проверка остатков
        foreach ($order->items as $item) {
            $stock = Stock::where([
                'warehouse_id' => $order->warehouse_id,
                'product_id' => $item->product_id
            ])->first();

            if (!$stock || $stock->stock < $item->count) {
                return Redirect::back()->withErrors(['error' => 'Недостаточно товара ' . $item->product_id . ' для возобновления заказа']);
            }
        }

        // Списывание товаров
        foreach ($order->items as $item) {
            Stock::where([
                'warehouse_id' => $order->warehouse_id,
                'product_id' => $item->product_id
            ])->decrement('stock', $item->count);
        }

        $order->update(['status' => 'active']);
        return Redirect::back()->with('success', 'Заказ успешно возобновлен');
    }
}
