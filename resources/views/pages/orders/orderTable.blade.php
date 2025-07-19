<div class="card mt-4">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>Клиент:</strong> {{ $order->customer }}</p>
                <p><strong>Склад:</strong> {{ $order->warehouse->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Статус:</strong>
                    <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'canceled' ? 'danger' : 'primary') }}">{{ $order->status }}</span>
                </p>
                <p><strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Товар</th>
                    <th scope="col">Количество</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderItems as $item)
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex mt-4">
            {{ $orderItems->links() }}
        </div>
    </div>

    <div class="modal fade" id="editOrderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование заказа #{{ $order->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('updateOrder', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="customer" class="form-label">Клиент</label>
                            <input type="text" class="form-control" id="customer" name="customer" value="{{ $order->customer }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Склад</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id" required>
                                @foreach($warehousesList as $warehouse)
                                    <option value="{{ $warehouse->id }}" {{ $warehouse->id == $order->warehouse_id ? 'selected' : '' }}>
                                        {{ $warehouse->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <h5>Товары в заказе</h5>
                        <div id="orderItemsContainer">
                            @foreach($order->items as $index => $item)
                                <div class="row mb-2 item-row">
                                    <div class="col-md-5">
                                        <select class="form-select product-select" name="items[{{$index}}][product_id]" required>
                                            <option value="">Выберите товар</option>
                                            @foreach($productsList as $product)
                                                <option value="{{ $product->id }}" {{ $product->id == $item->product_id ? 'selected' : '' }}>
                                                    {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" class="form-control" name="items[{{$index}}][count]" min="1" value="{{ $item->count }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-danger remove-item">Удалить</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="addItemBtn" class="btn btn-sm btn-secondary mt-2">Добавить товар</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let itemCounter = {{ count($order->items) }};

            // Добавление нового товара в форму
            document.getElementById('addItemBtn').addEventListener('click', function() {
                const newItem = `@include('pages.orders.newItemModal')`;
                document.getElementById('orderItemsContainer').insertAdjacentHTML('beforeend', newItem);
                itemCounter++;
            });

            // Удаление товара из формы
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-item')) {
                    const itemRows = document.querySelectorAll('.item-row');
                    if (itemRows.length > 1) {
                        e.target.closest('.item-row').remove();
                    } else {
                        alert('Заказ должен содержать хотя бы один товар');
                    }
                }
            });
        });
    </script>
@endsection
