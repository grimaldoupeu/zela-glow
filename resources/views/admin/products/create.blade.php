@extends('layouts.admin')

@section('title', 'Nuevo producto | Zela Glow')

@section('content')
<h1 class="fw-bold mb-4">Nuevo producto</h1>
<div class="admin-card p-4">
    <form method="POST" action="{{ route('admin.products.store') }}">
        @include('admin.products.form')
    </form>
</div>
@endsection
