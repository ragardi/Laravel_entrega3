@extends('home')

@section('title', 'Añade Libro')

@section('content')

    <div class="contenido-form">
        <h1>Nuevo Libro</h1>
        
        <br>

        <form action = "{{route('addLibro')}}" method = "POST">
            @csrf
            <div>
                <label for = "">Título</label>
                <input type = "text" name = "titulo"/>
            </div>
            
            <div>
                <label for = "">Autor</label>
                <input type = "text" name = "autor"/>
            </div>

            <div>
                <label for = "">Año publicación</label>
                <input type = "number" name = "ano_publicacion"/> 
            </div>

            <div>
                <label for = "">Género</label>
                <input type = "text" name = "genero"/>
            </div>

            <div>
                <label for = "">Disponible</label>
                <input type="radio" name="disponible" value="1" checked> Si
                <input type="radio" name="disponible" value="0"> No
            </div>

            <button type = "submit" class="boton"> GUARDAR</button>

        </form>
        
    </div>

@endsection


