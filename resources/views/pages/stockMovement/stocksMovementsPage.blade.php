@extends('index')
@section('title', 'История движений')
@section('stockMovementPageState', 'active')
@section('content')
    <div class="container">
        <h1>История движений товаров</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('stockMovementsPage') }}">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="warehouse_id" class="form-label">Склад</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id">
                                <option value="">Все склады</option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}" {{ request('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                        {{ $warehouse->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="product_id" class="form-label">Товар</label>
                            <select class="form-select" id="product_id" name="product_id">
                                <option value="">Все товары</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="date_from" class="form-label">Дата с</label>
                            <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                        </div>

                        <div class="col-md-2">
                            <label for="date_to" class="form-label">Дата по</label>
                            <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                        </div>

                        <div class="col-md-2">
                            <label for="per_page" class="form-label">На странице</label>
                            <select class="form-select" id="per_page" name="per_page">
                                <option value="15" {{ request('per_page', 15) == 15 ? 'selected' : '' }}>15</option>
                                <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Применить</button>
                            <a href="{{ route('stockMovementsPage') }}" class="btn btn-secondary">Сбросить</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Товар</th>
                            <th>Склад</th>
                            <th>Тип</th>
                            <th>Изменение</th>
                            <th>Заказ</th>
                            <th>Примечание</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movements as $movement)
                            <tr>
                                <td>{{ $movement->created_at->format('d.m.Y H:i') }}</td>
                                <td>{{ $movement->product->name }}</td>
                                <td>{{ $movement->warehouse->name }}</td>
                                <td>{{ $movement->movement_type }}</td>
                                <td class="{{ $movement->quantity_change > 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $movement->quantity_change > 0 ? '+' : '' }}{{ $movement->quantity_change }}
                                </td>
                                <td>
                                    @if($movement->order)
                                        <a href="{{ route('orderPage', $movement->order->id) }}">#{{ $movement->order->id }}</a>
                                    @endif
                                </td>
                                <td>{{ $movement->notes }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $movements->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
