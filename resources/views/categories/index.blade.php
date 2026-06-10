@extends('layouts.app')

@section('content')

<h2>🏷 Categorías</h2>

<a href="/categories/create" class="btn btn-primary mb-3">
    Nueva Categoría
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning btn-sm">Editar</a>

                <form action="/categories/{{ $category->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Eliminar categoría?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection