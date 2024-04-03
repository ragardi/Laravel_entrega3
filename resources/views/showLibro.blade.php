@extends('home')

@section('title', 'Mostrar Libros')

@section('content')
    <div class="contenido-form">
        <h1>Lista de Libros</h1>
        @if(count($libros) > 0)
            @foreach($libros as $libro)
                <p> Título: {{$libro->titulo}} -> Autor: {{$libro->autor}} </p>
            @endforeach
        @endif
    </div>
@endsection
