@extends('layouts.public')

@section('title', $product->name . ' | Zela Glow')

@section('content')
<section class="container py-5">
    <div class="row g-5 align-items-start">
        <div class="col-lg-6">
            <img class="img-fluid rounded-3 shadow-sm w-100" style="max-height: 560px; object-fit: cover;" src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>
        <div class="col-lg-6">
            <span class="badge badge-soft mb-3">{{ $product->category->name }}</span>
            <h1 class="fw-bold">{{ $product->name }}</h1>
            <p class="text-secondary fs-5">{{ $product->brand }}</p>
            <p>{{ $product->description }}</p>
            <div class="display-6 price mb-2">S/ {{ number_format($product->price, 2) }}</div>
            <p class="text-secondary">Stock disponible: <strong>{{ $product->stock }}</strong></p>
            <form method="POST" action="{{ route('cart.store', $product) }}" class="row g-3 align-items-end">
                @csrf
                <div class="col-sm-4">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="quantity" min="1" max="{{ max($product->stock, 1) }}" value="1" class="form-control">
                </div>
                <div class="col-sm-8">
                    <button class="btn btn-glow btn-lg w-100" @disabled($product->stock < 1)>
                        <i class="bi bi-bag-plus"></i> Agregar al carrito
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
