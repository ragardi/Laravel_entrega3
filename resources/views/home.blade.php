<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Biblioteca')</title>   
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class = "contenido-form">
                <ul>
                                  
                    <li><a href = "{{route('MostrarLibros')}}">Mostrar Libros</a></li>
                    <li><a href = "{{route('FormularioAddLibro')}}">Añadir Libro</a></li>
                    <li><a href = "{{route('FormularioUpdate')}}">Actualizar Libro</a></li>
                    <li><a href = "{{route('FormularioDelete')}}">Eliminar Libro</a></li>
                    <hr>
                    
                    <li><a href = "{{route('MostrarPrestamos')}}">Mostrar Préstamos</a></li>
                    <li><a href = "{{route('FormularioAddPrestamo')}}">Añadir Préstamo</a></li>
                    <li><a href = "{{route('FormularioUpdatePrestamo')}}">Actualizar Préstamo</a></li>
                    <li><a href = "{{route('FormularioDeletePrestamo')}}">Eliminar Préstamo</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
</html>

   