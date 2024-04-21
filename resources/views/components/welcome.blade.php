<div class="p-6 lg:p-8 bg-white border-b border-gray-200">    
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="text-2xl font-medium text-gray-900">
       Bienvenido a nuestra biblioteca 
    </h1>    
</div>

<div class="bg-gray-200 bg-opacity-25 gap-6 lg:gap-8 p-6 lg:p-8">
    @guest
        <div>
            <div class="flex items-center">            
                <h2 class="text-xl font-semibold text-gray-900">
                    <a href="{{ route('login')}}">Iniciar sesión</a>
                </h2>
            </div>        
        </div>

        <div>
            <div class="flex items-center">            
                <h2 class="text-xl font-semibold text-gray-900">
                    <a href="{{ route('register')}}">Registrarse</a>
                </h2>
            </div>            
        </div>    
    @endguest

    @auth
    <div>
        <div class="flex items-center">            
            <h2 class="text-xl font-semibold text-gray-900">
                <a href="{{ route('MostrarPrestamos')}}">Mis préstamos</a>
            </h2>
        </div> 
        <div class="flex items-center">            
            <h2 class="text-xl font-semibold text-gray-900">
                <a href="{{ route('profile.show')}}">Perfil</a>
            </h2>
        </div>          

        <div class="flex items-center">            
            <form method = "POST" action="{{route('logout')}}">    
                <h2 class="text-xl font-semibold text-gray-900">
                    @csrf
                    <a href="{{ route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Salir</a>
                </h2>
            </form>
        </div>                          
                        
    </div>

    @endauth
</div>
