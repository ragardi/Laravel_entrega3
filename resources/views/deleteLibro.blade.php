@extends('home')

@section('title', 'Eliminar Libro')

@section('content')

    <div class="contenido-form">
        <h1>Elimina Libro</h1>
        
        <br>

        <form action = "{{route('deleteLibro')}}" method = "POST">
            @csrf
            <div>
                <label for = "">Código Libro</label>
                <input type = "number" name = "id"/>
            </div>
            
            <button type = "submit" class="boton"> BORRAR</button>

        </form>
        
    </div>

@endsection