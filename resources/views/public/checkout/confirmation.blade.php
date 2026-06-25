@extends('layouts.public')

@section('title', 'Compra confirmada | Zela Glow')

@section('content')
<section class="container py-5">
    <div class="bg-white border rounded-3 p-5 text-center mx-auto" style="max-width: 760px;">
        <div class="display-4 text-success mb-3"><i class="bi bi-check-circle-fill"></i></div>
        <h1 class="fw-bold">Compra exitosa</h1>
        <p class="text-secondary">Gracias por comprar en Zela Glow. Tu pedido fue registrado para la demostracion academica.</p>
        <div class="row g-3 text-start mt-4">
            <div class="col-md-6"><strong>Numero de pedido:</strong><br>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</div>
            <div class="col-md-6"><strong>Metodo de pago:</strong><br>{{ $order->payment_method }}</div>
            <div class="col-md-6"><strong>Estado de pago:</strong><br>{{ $order->payment_status }}</div>
            <div class="col-md-6"><strong>Estado del pedido:</strong><br>{{ $order->order_status }}</div>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-glow mt-4">Volver al catalogo</a>
    </div>
</section>
@endsection
