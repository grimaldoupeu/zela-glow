@extends('layouts.public')

@section('title', 'Checkout | Zela Glow')

@section('content')
<section class="container py-5">
    <h1 class="section-title mb-4">Checkout simulado</h1>
    <div class="row g-4">
        <div class="col-lg-7">
            <form method="POST" action="{{ route('checkout.store') }}" class="bg-white border rounded-3 p-4">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nombre completo</label>
                        <input name="customer_name" value="{{ old('customer_name') }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Correo</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email') }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Telefono</label>
                        <input name="customer_phone" value="{{ old('customer_phone') }}" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Direccion</label>
                        <textarea name="customer_address" rows="3" class="form-control" required>{{ old('customer_address') }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Metodo de pago simulado</label>
                        <select name="payment_method" class="form-select" required>
                            @foreach(['Yape', 'Plin', 'Tarjeta demo', 'Transferencia bancaria', 'Contra entrega'] as $method)
                                <option value="{{ $method }}" @selected(old('payment_method') === $method)>{{ $method }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-glow btn-lg w-100">Confirmar compra simulada</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-5">
            <div class="bg-white border rounded-3 p-4">
                <h4 class="fw-bold mb-3">Resumen del pedido</h4>
                @foreach($cart as $item)
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                        <strong>S/ {{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                    </div>
                @endforeach
                <div class="d-flex justify-content-between fs-4 fw-bold mt-3">
                    <span>Total</span>
                    <span class="price">S/ {{ number_format($total, 2) }}</span>
                </div>
                <p class="small text-secondary mt-3 mb-0">Este pago es solo una simulacion academica. No se conecta a pasarelas reales.</p>
            </div>
        </div>
    </div>
</section>
@endsection
