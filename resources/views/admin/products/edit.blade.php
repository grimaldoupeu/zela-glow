@extends('layouts.admin')

@section('title', 'Editar producto | Zela Glow')

@section('content')
<h1 class="fw-bold mb-4">Editar producto</h1>
<div class="admin-card p-4">
    <form method="POST" action="{{ route('admin.products.update', $product) }}">
        @method('PUT')
        @include('admin.products.form')
    </form>
</div>
@endsection
