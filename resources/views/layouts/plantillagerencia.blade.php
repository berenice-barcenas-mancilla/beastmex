<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('titulo') </title>

    @vite(['resources/js/app.js']) 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gerencia.css') }}">


</head>
<body style="background: #043D3C;">
    
    @include('partials.navbargerencia')

    @yield('contenido')
    
</body>
</html>