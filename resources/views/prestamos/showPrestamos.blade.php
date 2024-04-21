<x-app-layout>
    <x-slot name="header" >
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Préstamos') }}
        </h2>
        <a href="{{ route('FormularioAddPrestamo') }}" class="text-sm text-center border-2 rounded-lg px-4 py-2.5">
            <i class="fa-solid fa-plus me-2"></i>
            Nuevo préstamo
        </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            @if(isset($prestamos->attributes))
                                <p>No hay préstamos</p>
                            @else
                                <table class="min-w-full align-middle">
                                <thead class="bg-gray-200 border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-left">
                                            Libro
                                        </th>
                                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                                            Fecha Préstamo
                                        </th>
                                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4 text-center">
                                            Fecha Devolución
                                        </th>
                                        <th scope="col" class="text-sm font-semibold text-gray-900 px-6 py-4">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($prestamos as $prestamo)
                                        <tr>
                                            <td class="align-middle px-6 py-4">
                                                @foreach ($libros as $libro)
                                                    @if($libro->id == $prestamo->book_id)
                                                        <option value={{$libro->id}} selected >{{$libro->titulo}}</option>
                                                    @endif
                                                @endforeach
                                            </td> 
                                            <td class="align-middle px-6 py-4">{{ date('d-m-Y', strtotime($prestamo->fecha_prestamo)) }}</td>
                                            <td class="align-middle px-6 py-4">{{ date('d-m-Y', strtotime($prestamo->fecha_devolucion)) }}</td>
                                            <td>
                                                @if($prestamo->fecha_devolucion >= today())
                                                    <a href="/updatePrestamo/{{$prestamo->id}}" class="text-sm text-center border-2 rounded-lg px-4 py-2.5">
                                                        <i class="fa-solid fa-plus me-2"></i>
                                                        Finalizar
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>                                                
                                    @endforeach
                                <tbody>
                            </table>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>