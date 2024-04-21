@extends('home')

@section('title', 'Actualiza Libro')

@section('content')

    <body>
        <div class="contenido-form">
            <h1>Actualiza Libro</h1>
            
            <br>

            <form action = "{{route('updateLibro')}}" method = "POST">
                @csrf
                <div>
                    <label for = "">Código Libro</label>
                    <input type = "number" name = "id"/>
                </div>

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
                    <input type="radio" name="disponible" value="1"> Si
                    <input type="radio" name="disponible" value="0"> No
                </div>

                <button type = "submit" class="boton"> GUARDAR</button>

            </form>
            
        </div>
@endsection