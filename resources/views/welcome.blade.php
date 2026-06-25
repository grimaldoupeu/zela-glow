@extends('layouts.public')

@section('title', 'Zela Glow')

@section('content')
<section class="container py-5 text-center">
    <h1 class="fw-bold">Zela Glow</h1>
    <p class="text-secondary">Tienda virtual academica de cosmeticos.</p>
    <a href="{{ route('home') }}" class="btn btn-glow">Ir al inicio</a>
</section>
@endsection
