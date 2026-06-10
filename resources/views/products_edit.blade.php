<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Editar Producto</h2>

    <form method="POST" action="/products/{{ $product->id }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price"
                   class="form-control"
                   value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock"
                   class="form-control"
                   value="{{ $product->stock }}" required>
        </div>

        <button type="submit" class="btn btn-success">
            Actualizar Producto
        </button>

        <a href="/products" class="btn btn-secondary">
            Volver
        </a>

    </form>

</body>
</html>