@extends('layouts.admin')

@section('title', 'Editar categoria | Zela Glow')

@section('content')
<h1 class="fw-bold mb-4">Editar categoria</h1>
<div class="admin-card p-4">
    <form method="POST" action="{{ route('admin.categories.update', $category) }}">
        @method('PUT')
        @include('admin.categories.form')
    </form>
</div>
@endsection
