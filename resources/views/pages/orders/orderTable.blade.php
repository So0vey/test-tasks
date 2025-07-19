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

</div>
