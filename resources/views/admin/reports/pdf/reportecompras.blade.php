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
      <h1>Reporte de Compras</h1>

    </header>
    <main>
      <h2>Lista de compras por periodo: desde {{$fechaini}} a {{$fechafin}}</h2>
      <table>

        <thead>
          <tr>
            <td>Id del producto</td>
            <td>Cantidad Comprada</td>
            <td>Fecha de compra</td>
          </tr>
        </thead>
        <tbody>
          @foreach($allShops as $shop)
          <tr>
            <td>{{ $shop->product_id }}</td>
            <td>{{ $shop->amount }}</td>
            <td>{{ $shop->fecha_compra }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
    </main>

  </body>
</html>