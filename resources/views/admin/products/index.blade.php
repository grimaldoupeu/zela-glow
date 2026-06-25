@extends('layouts.admin')

@section('title', 'Productos | Zela Glow')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <h1 class="fw-bold mb-0">Productos</h1>
    <div class="d-flex gap-2">
        <form method="GET" class="d-flex gap-2">
            <input name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar">
            <button class="btn btn-outline-dark">Filtrar</button>
        </form>
        <a href="{{ route('admin.products.create') }}" class="btn btn-glow"><i class="bi bi-plus-lg"></i> Nuevo</a>
    </div>
</div>
<div class="admin-card p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Producto</th><th>Categoria</th><th>Precio</th><th>Stock</th><th>Estado</th><th class="text-end">Acciones</th></tr></thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            <div><strong>{{ $product->name }}</strong><div class="small text-secondary">{{ $product->brand }}</div></div>
                        </div>
                    </td>
                    <td>{{ $product->category->name ?? 'Sin categoria' }}</td>
                    <td>S/ {{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td><span class="badge text-bg-{{ $product->status === 'Activo' ? 'success' : 'secondary' }}">{{ $product->status }}</span></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-dark" href="{{ route('admin.products.edit', $product) }}">Editar</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
</div>
@endsection
