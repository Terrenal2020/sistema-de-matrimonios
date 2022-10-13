            @extends('plantilla')
@section('seccion')

<div class="card">

    <div align="center"  class="card-body" style="background-color: #efefef;">

        <img class="card-img-top" style="width: 30%; height: 30%; margin-left: 35%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/768px-User_icon_2.svg.png">
        <div class="card-body">
            <form method="POST"  action="{{ route('login') }}">
                @csrf
                <!--se agrego validacion en el campo usuario y contraseña-->
                <h3>Inicio de sesión</h3>
                <div class="col-lg-5 col-sm-12 form-group">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="col-lg-5 col-sm-12 form-group">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
                </div>
                <!--fin de modificacion-->
                <button type="submit" class="btn btn-primary">Acceder</button>
                @if (Route::has('login'))
            
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inicio de sesion activa</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarme</a>
                        @endif
                    @endauth
                
            @endif
               
            </form>
        </div>


@stop
