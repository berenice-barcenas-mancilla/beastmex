@extends('admin.layouts.app')

@section('breadcrumb')
    <span class="font-weight-bold mr-4">Gráfica Compras</span>
@endsection

@section('content')

<h1>Gráfica</h1>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<canvas id="myChart" width="400" height="200"></canvas>

<script>
    // Configurar la gráfica con los datos proporcionados desde el controlador
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! $data->toJson() !!},   // Montos comprados
            datasets: [{
                label: 'Monto Comprado',
                data: {!! $labels->toJson() !!}, // IDs de productos
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


@endsection