@extends('home')

@section('title', 'Eliminar Préstamo')

@section('content')

    <div class="contenido-form">
        <h1>Eliminar Préstamo</h1>
        
        <br>

        <form action = "{{route('deletePrestamo')}}" method = "POST">
            @csrf
            <div>
                <label for = "">Código Préstamo</label>
                <input type = "number" name = "id"/>
            </div>
            
            <button type = "submit" class="boton"> BORRAR</button>

        </form>
        
    </div>

@endsection