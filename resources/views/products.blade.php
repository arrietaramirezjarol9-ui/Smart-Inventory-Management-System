<!DOCTYPE html>
<html>
<head>
    <title>SIGIV - Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">
            SIGIV - Sistema de Gestión de Inventario
        </span>
    </div>
</nav>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>📦 Gestión de Productos</h2>

        <div>
            <!-- 🔴 BOTÓN PDF -->
            <a href="/products/pdf" class="btn btn-danger me-2">
                📄 Exportar PDF
            </a>

            <!-- 🔵 BOTÓN NUEVO PRODUCTO -->
            <a href="/products/create" class="btn btn-primary">
                Nuevo Producto
            </a>
        </div>

    </div>

    <table class="table table-hover table-bordered">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>

        </thead>

        <tbody>

        @forelse($products as $product)

            <tr>

                <td>{{ $product->id }}</td>

                <td>{{ $product->name }}</td>

                <td>
                    {{ $product->category->name ?? 'Sin categoría' }}
                </td>

                <td>S/. {{ $product->price }}</td>

                <td>{{ $product->stock }}</td>

                <td>

                    <a href="/products/{{ $product->id }}/edit"
                       class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="/products/{{ $product->id }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar producto?')">

                            Eliminar

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center">

                    No hay productos registrados

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>