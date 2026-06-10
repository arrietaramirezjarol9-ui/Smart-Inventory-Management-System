@extends('layouts.app')

@section('content')

<h2>📊 Dashboard</h2>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Total Productos</h5>
            <h2>{{ $totalProducts }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Stock Bajo</h5>
            <h2>{{ $lowStock }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h5>Valor Inventario</h5>
            <h2>S/. {{ number_format($inventoryValue, 2) }}</h2>
        </div>
    </div>

</div>

<!-- 🚨 ALERTA STOCK BAJO -->
<div class="mt-5">
    <h4>⚠️ Productos con stock bajo</h4>

    @if($lowStockProducts->count() > 0)

        <div class="alert alert-warning">
            Hay productos con stock crítico (≤ 5 unidades)
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                </tr>
            </thead>

            <tbody>
                @foreach($lowStockProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td style="color:red; font-weight:bold;">
                        {{ $product->stock }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <div class="alert alert-success">
            Todo el inventario está en niveles normales 👍
        </div>
    @endif
</div>

<!-- 📊 GRÁFICO -->
<div class="mt-5">
    <h4>📊 Productos por categoría</h4>

    <canvas id="categoryChart" height="100"></canvas>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('categoryChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($categories->pluck('name')) !!},
        datasets: [{
            label: 'Productos',
            data: {!! json_encode($categories->pluck('products_count')) !!},
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection