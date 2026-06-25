@extends('layouts.public')

@section('title', 'Catalogo | Zela Glow')

@section('content')
<section class="container py-5">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
        <div>
            <h1 class="section-title mb-1">Catalogo Zela Glow</h1>
            <p class="text-secondary mb-0">Filtra por categoria o busca por nombre, marca y descripcion.</p>
        </div>
        <form class="row g-2 col-lg-7" method="GET" action="{{ route('products.index') }}">
            <div class="col-md-5">
                <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Buscar producto">
            </div>
            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">Todas las categorias</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('category') == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-glow w-100"><i class="bi bi-funnel"></i> Filtrar</button>
            </div>
        </form>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-sm-6 col-lg-3">
                @include('public.products.card', ['product' => $product])
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-light border">No se encontraron productos con esos filtros.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">{{ $products->links() }}</div>
</section>
@endsection
