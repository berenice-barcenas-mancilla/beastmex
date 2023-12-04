<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Title</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <!-- Añade más encabezados según sea necesario -->
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
                <tr>
                    <td>{{ $seller->id }}</td>
                    <td>{{ $seller->cliente }}</td>
                    <td>{{ $seller->fecha }}</td>
                </tr>
                <!-- Agrega una fila vacía para separar las tablas -->
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <!-- Inicia la segunda tabla dentro de la misma fila -->
                <tr>
                    <td colspan="3">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <!-- Añade más encabezados según sea necesario -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(json_decode($seller->content, true) as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                        <td>{{ $item['price'] }}</td>
                                        <!-- Añade más celdas según sea necesario -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- Cierra la segunda tabla -->
            @endforeach
        </tbody>
    </table>

</body>
</html>
