<div class="row mb-2 item-row">
    <div class="col-md-5">
        <select class="form-select product-select" name="items[${itemCounter}][product_id]" required>
            <option value="">Выберите товар</option>
            @foreach($productsList as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <input type="number" class="form-control" name="items[${itemCounter}][count]" min="1" value="1" required>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger remove-item">Удалить</button>
    </div>
</div>
