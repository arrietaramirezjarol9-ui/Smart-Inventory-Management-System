<!DOCTYPE html>
<html>
<head>
    <title>SIGIV</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #212529;
            padding: 20px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
            width: 100%;
        }
    </style>

</head>

<body>

<div class="sidebar">
    <h4 class="text-white mb-4">SIGIV</h4>

    <a href="/dashboard">📊 Dashboard</a>
    <a href="/products">📦 Productos</a>

    <!-- ✅ AQUÍ AGREGAMOS CATEGORÍAS -->
    <a href="/categories">🏷 Categorías</a>

    <a href="/profile">👤 Perfil</a>

    <form method="POST" action="/logout">
        @csrf
        <button class="btn btn-danger w-100 mt-3">Cerrar sesión</button>
    </form>
</div>

<div class="content">

    @yield('content')

</div>

</body>
</html>