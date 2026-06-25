@extends('layouts.admin')

@section('title', 'Nueva categoria | Zela Glow')

@section('content')
<h1 class="fw-bold mb-4">Nueva categoria</h1>
<div class="admin-card p-4">
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @include('admin.categories.form')
    </form>
</div>
@endsection
