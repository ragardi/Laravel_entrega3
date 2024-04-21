<x-app-layout>
    <x-slot name="header" >
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Finalizar') }}
            </h2>        
        </div>
    </x-slot>


    <div class="py-12">
        <div class="w-full mx-auto sm:max-w-md  px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('updateFinPrestamo') }}">
                    @csrf
                    <div class="mt-4 hidden">
                        <x-label for="id" :value="__('ID Préstamo')" />

                        <x-input id="id" class="block mt-1 w-full" type="text" name="id" :value="$prestamo->id" />
                    </div>
                    <div class="mt-4 hidden">
                        <x-label for="user_id" :value="__('ID Usuario')" />

                        <x-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="$prestamo->user_id" />
                    </div>

                    <div class="mt-4">
                        <x-label for="" :value="__('Libro')" />
                        @foreach ($libros as $libro)
                            @if($libro->id == $prestamo->book_id)
                                <option value={{$libro->id}} selected >{{$libro->titulo}}</option>
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <x-label for="date" :value="__('Fecha Inicio')" />

                        <x-input id="fecha_prestamo" class="block mt-1 w-4/5" type="date" name="fecha_prestamo" :value="$prestamo->fecha_prestamo" disabled />
                    </div>

                    <div class="mt-4">
                        <x-label for="date" :value="__('Fecha Fin')" />

                        <x-input id="fecha_devolucion" class="block mt-1 w-2/4" type="date" name="fecha_devolucion" :value="$prestamo->fecha_devolucion" autofocus/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="ml-4 px-4 py-2 rounded-md font-semibold text-xs text-white uppercase bg-indigo-500">
                            {{ __('Finalizar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

   