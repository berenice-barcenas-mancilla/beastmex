<!DOCTYPE html>
<html>
<head>
    <title>Detalle de Compra</title>
</head>
<body>
    <h1>Detalle de Compra</h1>
    <p><strong>ID de Compra:</strong> {{ $shop->id }}</p>
    
    <h2>Información del Proveedor</h2>
    <p><strong>Proveedor:</strong> {{ $supplier->supplier }}</p>
    <p><strong>Descripción:</strong> {{ $supplier->description }}</p>

    <h2>Información del Producto</h2>
    <p><strong>Nombre:</strong> {{ $store->nombre }}</p>
    <p><strong>Número de Serie:</strong> {{ $store->noDeSerie }}</p>
    <!-- Agrega más campos según tus necesidades -->

    <!-- Puedes personalizar este diseño según tus necesidades -->
</body>
</html>
