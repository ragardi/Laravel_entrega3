@extends('home')

@section('title', 'Mostrar Prestamos')

@section('content')
    <div class="contenido-form">
        <h1>Lista de Prestamos</h1>
        @if(count($prestamos) > 0)
            @foreach($prestamos as $prestamo)
                <p> ID Libro: {{$prestamo->book_id}} -> Fecha préstamo: {{$prestamo->fecha_prestamo}} </p>
            @endforeach
        @endif
    </div>
@endsection
