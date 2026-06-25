@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Nombre</label>
        <input name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Estado</label>
        <select name="status" class="form-select" required>
            @foreach(['Activo', 'Inactivo'] as $status)
                <option value="{{ $status }}" @selected(old('status', $category->status ?: 'Activo') === $status)>{{ $status }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Descripcion</label>
        <textarea name="description" rows="4" class="form-control">{{ old('description', $category->description) }}</textarea>
    </div>
</div>
<div class="mt-4 d-flex gap-2">
    <button class="btn btn-glow">Guardar</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark">Cancelar</a>
</div>
