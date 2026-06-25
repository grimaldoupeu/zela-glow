@csrf
<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Marca</label>
        <input name="brand" value="{{ old('brand', $product->brand) }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Categoria</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Precio</label>
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Stock</label>
        <input type="number" min="0" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" required>
    </div>
    <div class="col-md-9">
        <label class="form-label">URL de imagen</label>
        <input type="url" name="image" value="{{ old('image', $product->image) }}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Estado</label>
        <select name="status" class="form-select" required>
            @foreach(['Activo', 'Inactivo'] as $status)
                <option value="{{ $status }}" @selected(old('status', $product->status ?: 'Activo') === $status)>{{ $status }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Descripcion</label>
        <textarea name="description" rows="5" class="form-control" required>{{ old('description', $product->description) }}</textarea>
    </div>
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-glow">Guardar</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark">Cancelar</a>
</div>
