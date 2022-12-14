<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{--<img src="http://serra.nodoshub.com/public/storage/serralogo.jpg" alt="Aqui va una imagen">--}}
            <img src="http://serra.nodoshub.com/public/storage/serralogo.jpg" alt="Aqui va una imagen" height=250 width=350>
        </x-slot>

        <h1 class="display-1 text-center">
            <strong>Sistema de Stock</strong>
        </h1>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{--<div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>--}}

            <div>
                <x-jet-label for="name" value="{{ __('Nombre y Apellido') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordar usuario') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidó su contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    
    <a href="https://e-nodos.com/">Desarrollado por Nodos</a>
    <img src="http://localhost/sistema_stock/public/storage/logo de NODOS HUB.jpg" height="120" width="120" alt="Aqui va una imagen">
        
    </div>
        
    
    
</x-guest-layout>