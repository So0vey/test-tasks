<div class="card mt-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Название склада</th>
                    <th scope="col" class="text-center">Дата создания</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($warehousesList as $warehouse)
                    <tr>
                        <td class="text-center">{{ $warehouse->id }}</td>
                        <td>{{ $warehouse->name }}</td>
                        <td class="text-center">{{ $warehouse->created_at->translatedFormat('d.m.Y H:i') }}</td>
                        <td class="text-center">
                            <a href="{{ route('warehouseStockPage', ['id' => $warehouse->id]) }}" class="btn btn-sm btn-primary">Смотреть содержимое</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex mt-4">
            {{ $warehousesList->links() }}
        </div>
    </div>
</div>
