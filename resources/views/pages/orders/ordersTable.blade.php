<div class="card mt-4">
    <div class="card-body">

        <form method="GET" action="{{ route('ordersPage') }}" class="mb-4">
            <div class="row g-3">
                <div class="col">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Все</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Активные</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Завершенные
                        </option>
                        <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Отмененные
                        </option>
                    </select>
                </div>
                <div class="col">
                    <label for="warehouse_id" class="form-label">Склад</label>
                    <select class="form-select" id="warehouse_id" name="warehouse_id">
                        <option value="">Все склады</option>
                        @foreach($warehousesList as $warehouse)
                            <option
                                value="{{ $warehouse->id }}" {{ request('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                {{ $warehouse->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col">
                    <label for="sortBy" class="form-label">Сортировка</label>
                    <select class="form-select" id="sortBy" name="sortBy">
                        <option value="id" {{ request('sortBy') == 'id' ? 'selected' : '' }}>ID</option>
                        <option value="created_at" {{ request('sortBy') == 'created_at' ? 'selected' : '' }}>Дате
                        </option>
                    </select>
                </div>

                <div class="col">
                    <label for="sortType" class="form-label">Порядок</label>
                    <select class="form-select" id="sortType" name="sortType">
                        <option value="asc" {{ request('sortType') == 'asc' ? 'selected' : '' }}>По возрастанию</option>
                        <option value="desc" {{ request('sortType') == 'desc' ? 'selected' : '' }}>По убыванию</option>
                    </select>
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary me-2">Применить</button>
                    <a href="{{ route('ordersPage') }}" class="btn btn-outline-secondary">Сбросить</a>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Заказчик</th>
                    <th scope="col">Склад</th>
                    <th scope="col">Статус</th>
                    <th scope="col" class="text-center">Создан</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderList as $order)
                    <tr>
                        <td class="text-center">{{ $order->id }}</td>
                        <td>{{ $order->customer }}</td>
                        <td>{{ $order->warehouse->name }}</td>
                        <td>
                            {{ $order->status }}
                            @if($order->status == 'completed' && $order->completed_at)
                                ({{ $order->completed_at->translatedFormat('d.m.Y H:i') }})
                            @endif
                        </td>
                        <td class="text-center">{{ $order->created_at->translatedFormat('d.m.Y H:i') }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('orderPage', ['id' => $order->id]) }}" class="btn btn-sm btn-primary">Посмотреть и изменить</a>
                                @if($order->status == 'active')
                                    <button type="submit" form="complete-form-{{ $order->id }}" class="btn btn-sm btn-success">Завершить</button>
                                    <button type="submit" form="cancel-form-{{ $order->id }}" class="btn btn-sm btn-danger">Отменить</button>
                                @elseif($order->status == 'canceled')
                                    <button type="submit" form="resume-form-{{ $order->id }}" class="btn btn-sm btn-warning">Возобновить</button>
                                @endif
                            </div>

                            <form id="complete-form-{{ $order->id }}" method="POST" action="{{ route('completeOrder', $order->id) }}" class="d-none">
                                @csrf @method('PUT')
                            </form>
                            <form id="cancel-form-{{ $order->id }}" method="POST" action="{{ route('cancelOrder', $order->id) }}" class="d-none">
                                @csrf @method('PUT')
                            </form>
                            <form id="resume-form-{{ $order->id }}" method="POST" action="{{ route('resumeOrder', $order->id) }}" class="d-none">
                                @csrf @method('PUT')
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex mt-4">
            {{ $orderList->links() }}
        </div>
    </div>
</div>
