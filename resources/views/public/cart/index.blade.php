@extends('layouts.public')

@section('title', 'Carrito | Zela Glow')

@section('content')
<section class="container py-5">
    <h1 class="section-title mb-4">Carrito de compra</h1>
    @if(empty($cart))
        <div class="p-5 bg-white border rounded-3 text-center">
            <h4 class="fw-bold">Tu carrito esta vacio</h4>
            <p class="text-secondary">Explora el catalogo y agrega tus cosmeticos favoritos.</p>
            <a href="{{ route('products.index') }}" class="btn btn-glow">Continuar compra</a>
        </div>
    @else
        <form method="POST" action="{{ route('cart.update') }}">
            @csrf
            @method('PATCH')
            <div class="table-responsive bg-white border rounded-3">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="width:64px;height:64px;object-fit:cover;border-radius:8px;">
                                    <div>
                                        <strong>{{ $item['name'] }}</strong>
                                        <div class="small text-secondary">{{ $item['brand'] }} | Stock {{ $item['stock'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>S/ {{ number_format($item['price'], 2) }}</td>
                            <td style="width:140px;">
                                <input class="form-control" type="number" min="1" max="{{ $item['stock'] }}" name="quantities[{{ $item['product_id'] }}]" value="{{ $item['quantity'] }}">
                            </td>
                            <td class="fw-bold">S/ {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td class="text-end">
                                <button form="delete-{{ $item['product_id'] }}" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-4">
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-outline-dark"><i class="bi bi-arrow-repeat"></i> Actualizar</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-glow">Continuar compra</a>
                    <button form="clear-cart" class="btn btn-outline-danger">Vaciar carrito</button>
                </div>
                <div class="text-md-end">
                    <div class="fs-4 fw-bold">Total: <span class="price">S/ {{ number_format($total, 2) }}</span></div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-glow btn-lg mt-2">Finalizar compra</a>
                </div>
            </div>
        </form>
        @foreach($cart as $item)
            <form id="delete-{{ $item['product_id'] }}" method="POST" action="{{ route('cart.destroy', $item['product_id']) }}">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
        <form id="clear-cart" method="POST" action="{{ route('cart.clear') }}">
            @csrf
            @method('DELETE')
        </form>
    @endif
</section>
@endsection
