<div class="card mt-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col" class="text-center">Цена</th>
                    <th scope="col" class="text-center">Осталось</th>
                    <th scope="col" class="text-center">Последнее обновление на складе</th>
                </tr>
                </thead>
                <tbody>
                @foreach($warehouseStocks as $productStock)
                    <tr>
                        <td class="text-center">{{ $productStock->product->id }}</td>
                        <td>{{ $productStock->product->name }}</td>
                        <td class="text-center">{{ $productStock->product->price }}</td>
                        <td class="text-center">{{ $productStock->stock }}</td>
                        <td class="text-center">{{ $productStock->updated_at->translatedFormat('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex mt-4">
            {{ $warehouseStocks->links() }}
        </div>
    </div>
</div>
