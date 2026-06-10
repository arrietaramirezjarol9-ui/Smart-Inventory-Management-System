@extends('layouts.app')

@section('content')

<h2>Nueva Categoría</h2>

<form method="POST" action="/categories">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control">
    </div>

    <button class="btn btn-success">Guardar</button>
</form>

@endsection