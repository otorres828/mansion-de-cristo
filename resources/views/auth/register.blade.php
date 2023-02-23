<x-authentication-layout>
    <h1 class="text-2xl text-slate-800 font-bold mb-6">{{ __('Registrate!') }} ✨</h1>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif   
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                @livewire('admin.temples-index')
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>



            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="rounded w-1/2 p-2 text-indigo-100 bg-indigo-500 hover:bg-indigo-700">
                    {{ __('Registrarse') }}
                </button>
            </div>
        </form>
        <x-jet-validation-errors class="mt-4" />   
        {{-- <div class="pt-5 mt-6 border-t border-slate-200">
            <div class="mt-5">
                <div class="bg-amber-100 text-amber-600 px-3 py-2 rounded">
                    <svg class="inline w-3 h-3 shrink-0 fill-current" viewBox="0 0 12 12">
                        <path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                    </svg>
                    <span class="text-sm">
                        De parte del departamento de Tecnologia e Innovacion, esperamos que te pueda ser util esta aplicacion.
                    </span>
                </div>
            </div>
        </div> --}}
    </x-authentication-layout>
    
