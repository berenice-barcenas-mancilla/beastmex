<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/almacen.css') }}">

    <title>@yield('titulo')</title>
</head>
<body>
    @include('admin.partials.navbar')
    @yield('contenido')
    {{-- @include('partials.') --}}
</body>
</html>