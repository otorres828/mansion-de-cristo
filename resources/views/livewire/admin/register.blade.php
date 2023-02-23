<div>
    <h1 class="text-2xl text-slate-800 font-bold mb-6">{{ __('Registrate!') }} ✨</h1>
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

        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input wire:model="nombre" class="rounded shadow block mt-1 w-full" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input wire:model="correo" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
        </div>
        <div class="mt-4">
            <x-jet-label value="Ingrese el codigo de su jerarquia" />
            <x-jet-input wire:model="jerarquia" class="block mt-1 w-full uppercase" type="text" required />
        </div>
  
        <div class="mt-4">
            <x-jet-label value="Ingrese el codigo de su cobertura" />
            <x-jet-input wire:model="cobertura" class="block mt-1 w-full uppercase" type="text" required />
        </div>
        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input wire:model="clave" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input wire:model="confirmarclave" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
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
</div>
