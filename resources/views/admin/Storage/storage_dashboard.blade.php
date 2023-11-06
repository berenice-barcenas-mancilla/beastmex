{{-- Se incluye la plantilla ya predefinida del menú --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección según el sitio que se esté consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Listado de productos</span>
    <a href="/storage/products" class="btn btn-primary">
        <img src="{{ asset('images/Products.png') }}" alt="Editar" width="25">
        Productos
    </a> 
@endsection

@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class a="card-label">
                    Almacén
                </h3>
            </div>
        </div>
        <div class="card-body">
            <canvas id="stockChart" width="400" height="200"></canvas>
        </div>
    </div>


    @endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById('stockChart').getContext('2d');
        var products = ['CPU', 'GPU', 'RAM', 'HDD', 'SSD'];
        var stockData = {
            labels: products,
            datasets: [{
                label: 'Stock de Productos de PC',
                data: [100, 80, 150, 200, 120],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var stockChart = new Chart(ctx, {
            type: 'bar',
            data: stockData,
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
