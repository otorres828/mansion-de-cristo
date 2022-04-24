<x-guest-layout>
    <style>
        .image {
            background-image: url("{{ asset('images/icons/icon-512x512.png') }}");
            height: 550px;
        }

    </style>
    @include('components.aminblog.navigation')
    <div class="image">
        <x-jet-authentication-card>
            <x-slot name="logo">
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="pb-1">
                    <x-jet-label for="email" value="{{ __('Correo Electronico') }}" class="pb-2" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        autofocus placeholder="Escriba su correo" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Clave') }}" class="pb-2" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" placeholder="Esciba su clave" />
                </div>

                <div class="block mt-4 px-2">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                    </label>
                </div>
                <div class="px-2 pt-3">
                    <button
                        class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        Iniciar Sesion
                    </button>
                </div>

                <div class="flex items-center justify-between pt-2 px-2">
                    <div class="">
                        @if (Route::has('password.request'))
                            <a class="text-slate-500 " href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu clave?') }}
                            </a>
                        @endif
                    </div>
                    <div class="">
                        <a class="text-slate-500" href="{{ route('register') }}">
                            {{ __('Registrarse') }}
                        </a>
                    </div>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>

</x-guest-layout>
