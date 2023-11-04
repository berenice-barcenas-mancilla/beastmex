@extends('layouts.plantillagerencia')

@section('title', 'Gerencia')

@section('contenido')


    <section id="user-management">
        <h2>Administración de Usuarios</h2>
        <form>
            <label for="full-name">Nombre completo:</label>
            <input type="text" id="full-name" name="full-name" required>

            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required>

            <label for="position">Puesto:</label>
            <input type="text" id="position" name="position" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrar Usuario</button>
        </form>

        <h3>Usuarios Registrados</h3>
        <ul>
            <li>Usuario 1: Nombre - Correo - Puesto</li>
            <li>Usuario 2: Nombre - Correo - Puesto</li>
            <!-- Agrega más usuarios registrados aquí -->
        </ul>
    </section>

    <section id="data-analysis">
        <h2>Análisis de Datos</h2>
        <button>Consulta de Compras</button>
        <button>Consulta de Ventas</button>
        <button>Reportes de Compras</button>
        <button>Reportes de Ventas</button>
        <button>Reportes de Ganancias</button>
    </section>
    
    


@endsection