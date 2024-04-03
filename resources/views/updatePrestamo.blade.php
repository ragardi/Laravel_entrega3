@extends('home')

@section('title', 'Actualizar Préstamo')

@section('content')

    <div class="contenido-form">
        <h1>Actualizar Préstamo</h1>
        
        <br>

        <form action = "{{route('updatePrestamo')}}" method = "POST">
            @csrf
            <div>
                <label for = "">ID del Préstamo</label>
                <input type = "number" name = "id"/>
            </div>

            <div>
                <label for = "">ID del Usuario</label>
                <input type = "number" name = "user_id"/>
            </div>
            
            <div>
                <label for = "">Fecha Préstamo</label>
                <input type = "date" name = "fecha_prestamo"/> 
            </div>

            <div>
                <label for = "">Fecha Devolución</label>
                <input type = "date" name = "fecha_devolucion"/> 
            </div>

            <button type = "submit" class="boton"> GUARDAR</button>

        </form>
        
    </div>

@endsection
