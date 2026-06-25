@extends('layouts.public')

@section('title', 'Contacto | Zela Glow')

@section('content')
<section class="container py-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <h1 class="section-title">Contacto</h1>
            <p class="lead">Estamos listas para ayudarte en esta experiencia academica de tienda cosmetica.</p>
            <div class="bg-white border rounded-3 p-4">
                <p class="mb-2"><i class="bi bi-envelope"></i> beyri.zm@gmail.com</p>
                <p class="mb-2"><i class="bi bi-shop"></i> Zela Glow</p>
                <p class="mb-0"><i class="bi bi-credit-card"></i> Pagos simulados: Yape, Plin, tarjeta demo, transferencia y contra entrega.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <form class="bg-white border rounded-3 p-4">
                <label class="form-label">Nombre</label>
                <input class="form-control mb-3" placeholder="Tu nombre">
                <label class="form-label">Correo</label>
                <input class="form-control mb-3" placeholder="correo@ejemplo.com">
                <label class="form-label">Mensaje</label>
                <textarea class="form-control mb-3" rows="5" placeholder="Escribe tu consulta"></textarea>
                <button type="button" class="btn btn-glow w-100">Enviar mensaje demo</button>
            </form>
        </div>
    </div>
</section>
@endsection
