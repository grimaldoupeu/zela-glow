@extends('layouts.admin')

@section('title', 'Categorias | Zela Glow')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold mb-0">Categorias</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-glow"><i class="bi bi-plus-lg"></i> Nueva</a>
</div>
<div class="admin-card p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nombre</th><th>Descripcion</th><th>Productos</th><th>Estado</th><th class="text-end">Acciones</th></tr></thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="fw-bold">{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td><span class="badge text-bg-{{ $category->status === 'Activo' ? 'success' : 'secondary' }}">{{ $category->status }}</span></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar categoria?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $categories->links() }}
</div>
@endsection
