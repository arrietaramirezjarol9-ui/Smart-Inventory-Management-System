@extends('layouts.app')

@section('content')

<h2>Editar Categoría</h2>

<form method="POST" action="/categories/{{ $category->id }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control"
               value="{{ $category->name }}">
    </div>

    <button class="btn btn-success">Actualizar</button>
</form>

@endsection