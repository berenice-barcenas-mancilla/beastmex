<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/reporte.css') }}" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        {{-- <img src="{{ asset('images/icon.png') }}"> --}}
      </div>
      <h1>Reporte de Almacen</h1>

    </header>
    <main>
      <h2>Lista de Productos por periodo: de {{$fechaini}} a {{$fechafin}}</h2>
      <table>

        <thead>
          <tr>
            <td>Nombre del producto</td>
            <td>Noº Serie</td>
            <td>Marca</td>
            <td>Stock</td>
            <td>Costo de compra</td>
            <td>Precio de venta</td>
          </tr>
        </thead>
        <tbody>
          @foreach($allProducts as $product)
          <tr>
            <td>{{ $product->nombre }}</td>
            <td>{{ $product->noDeSerie }}</td>
            <td>{{ $product->marca }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->costoCompra }}</td>
            <td>{{ $product->precioVenta }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
    </main>

  </body>
</html>