@extends('layouts.public')

@section('title', 'Zela Glow | Tienda de cosmeticos')

@section('content')
<section class="hero">
    <div class="container">
        <div class="col-lg-7">
            <span class="badge badge-soft mb-3 px-3 py-2">Belleza academica, compra simulada</span>
            <h1 class="display-4 fw-bold mb-3">Descubre tu brillo con Zela Glow</h1>
            <p class="lead text-secondary mb-4">Cosmeticos, skincare, fragancias y accesorios en una tienda virtual moderna preparada para exposicion final.</p>
            <form action="{{ route('products.index') }}" class="row g-2 mb-4">
                <div class="col-md-8">
                    <input type="search" name="search" class="form-control form-control-lg" placeholder="Buscar labial, serum, perfume...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-glow btn-lg w-100"><i class="bi bi-search"></i> Buscar</button>
                </div>
            </form>
            <a href="{{ route('products.index') }}" class="btn btn-outline-dark btn-lg">Ir al catalogo</a>
        </div>
    </div>
</section>

<section class="promo-band py-3">
    <div class="container d-flex flex-column flex-md-row justify-content-between gap-2 text-center">
        <span><i class="bi bi-stars"></i> 2x1 simulado en accesorios seleccionados</span>
        <span><i class="bi bi-truck"></i> Entrega demo para exposicion academica</span>
        <span><i class="bi bi-credit-card-2-front"></i> Pagos 100% simulados</span>
    </div>
</section>

<section class="container py-5">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="section-title mb-1">Productos destacados</h2>
            <p class="text-secondary mb-0">Una seleccion lista para vender en la demo.</p>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-outline-glow">Ver todo</a>
    </div>
    <div class="row g-4">
        @foreach($featuredProducts as $product)
            <div class="col-sm-6 col-lg-3">
                @include('public.products.card', ['product' => $product])
            </div>
        @endforeach
    </div>
</section>

<section class="container pb-5">
    <div class="row g-3">
        @foreach($categories as $category)
            <div class="col-6 col-md-3">
                <a class="text-decoration-none" href="{{ route('products.index', ['category' => $category->id]) }}">
                    <div class="p-4 bg-white border rounded-3 h-100">
                        <div class="fw-bold text-dark">{{ $category->name }}</div>
                        <small class="text-secondary">{{ $category->products_count ?? '' }} Explorar categoria</small>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
@endsection
