<div class="md:grid md:grid-cols-3 md:gap-6 pt-10 sm:pt-0">
    <div class="md:col-span-1 flex justify-between">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">Información de Contugue</h3>
            @if ($conyugue)
            <p class="mt-1 text-sm text-gray-600">
                Visualice la informacion de su conyugue
            </p>
            @else
                <p class="mt-1 text-sm text-gray-600">
                    Añada a su conyugue ingresando el codigo de usuario de este
                </p>
            @endif
        </div>

    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        @if ($conyugue)
        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label value="Nombre del Conyugue"
                        class="text-justify" />
                    <x-jet-input id="name" type="text" class="mt-2 block w-full " disabled
                        value="{{$conyugue->name}}" />
                        <x-jet-label value="Correo del Conyugue"
                        class="text-justify mt-2" />
                    <x-jet-input id="name" type="text" class="mt-2 block w-full " disabled
                        value="{{$conyugue->email}}" />
                
                </div>
            </div>
        </div>
        @else
            <form>
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label value="Ingresar Codigo del Conyugue"
                                class="text-justify" />
                            <x-jet-input id="name" type="text" class="mt-2 block w-full"
                                wire:model.defer="state.name" autocomplete="name" />
                            <x-jet-input-error for="name" class="mt-2 uppercase" />
                            <x-jet-label class="mt-4"
                                value="Tenga presente que al agregar su conyugue, este debera de aceptar la solicitud de conyugue y una vez aceptado, todos los discipulos y celulas pasaran a ser directamente del conyugue con el genero 'Hombre'. Estos cambios son irreversibles." />

                        </div>
                    </div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('ao48vqtNoQVveU5MqKjF').on('saved', () => {
                        clearTimeout(timeout);
                        shown = true;
                        timeout = setTimeout(() => { shown = false }, 2000);
                    })"
                        x-show.transition.out.opacity.duration.1500ms="shown"
                        x-transition:leave.opacity.duration.1500ms="" style="display: none;"
                        class="text-sm text-gray-600 mr-3">
                        Guardado.
                    </div>

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        wire:loading.attr="disabled" wire:target="photo">
                        Guardar
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>
