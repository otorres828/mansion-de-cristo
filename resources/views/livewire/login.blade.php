<div>
    <h1 class="text-2xl text-slate-800 font-bold mb-6">{{ __('Bienvenido de vuelta!') }} ✨</h1>
    @if (session('status'))
        <div class="mb-4 font-bold text-md text-green-700">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-4 font-bold text-md text-red-700">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="save">
        <div class="space-y-4">
            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input wire:model="correo" type="email" class="w-full" required
                    autofocus />
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('Clave') }}" />
                <x-jet-input wire:model="clave" class="w-full" type="password" required
                     />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            {{-- @if (Route::has('password.request'))
                <div class="mr-1">
                    <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
            @endif             --}}
            <button type="submit" class="rounded w-full p-2 text-indigo-100 bg-indigo-500 hover:bg-indigo-700">
                {{ __('Iniciar Sesion') }}
            </button>
        </div>
    </form>
    <x-jet-validation-errors class="mt-4" />
    <div class="pt-5 mt-6 border-t border-slate-200">
        <div class="text-sm">
            {{ __('¿Aun no tienes una cuenta?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600"
                href="{{ route('register') }}">{{ __('Registrarse') }}</a>
        </div>
        <!-- Warning -->
        <div class="mt-5">
            <div class="bg-amber-100 text-amber-600 px-3 py-2 rounded">
                <svg class="inline w-3 h-3 shrink-0 fill-current" viewBox="0 0 12 12">
                    <path
                        d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                </svg>
                <span class="text-sm">
                    De parte del departamento de Tecnologia e Innovacion, esperamos que te pueda ser util esta
                    aplicacion.
                </span>
            </div>
        </div>
    </div>
</div>
