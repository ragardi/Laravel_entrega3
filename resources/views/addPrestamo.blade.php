@extends('home')

@section('title', 'Nuevo Préstamo')

@section('content')

    <div class="contenido-form">
        <h1>Nuevo Préstamo</h1>
        
        <br>

        <form action = "{{route('addPrestamo')}}" method = "POST">
            @csrf
            <div>
                <label for = "">ID del Usuario</label>
                <input type = "number" name = "user_id"/>
            </div>
            
            <div>
                <label for = "">ID del Libro</label>
                <input type = "number" name = "book_id"/>
            </div>

            <div>
                <label for = "">Fecha Préstamo</label>
                <input type = "date" name = "fecha_prestamo"/> 
            </div>

            <button type = "submit" class="boton"> GUARDAR</button>

        </form>
        
    </div>

@endsection
