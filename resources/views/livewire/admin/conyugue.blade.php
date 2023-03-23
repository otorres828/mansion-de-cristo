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
                        <x-jet-label value="Nombre del Conyugue" class="text-justify" />
                        <x-jet-input type="text" class="mt-2 block w-full " disabled value="{{ $conyugue->name }}" />
                        <x-jet-label value="Correo del Conyugue" class="text-justify mt-2" />
                        <x-jet-input type="text" class="mt-2 block w-full " disabled
                            value="{{ $conyugue->email }}" />
                    </div>
                </div>
            </div>
        @else
            <div>
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label value="Ingresar Codigo del Conyugue" class="text-justify" />
                            <x-jet-input type="text" class="mt-2 block w-full uppercase" wire:model="codigo" />
                            <x-jet-label class="mt-4"
                                value="Tenga presente que al agregar su conyugue, este debera de aceptar la solicitud de conyugue y una vez aceptado, todos los discipulos y celulas oficiales y evangelisticas pasaran a ser directamente del conyugue con el genero 'Hombre'. Estos cambios son irreversibles." />
                        </div>
                    </div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    @if (session('status'))
                        <div class="mb-4 font-bold text-md text-red-700 pr-5">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-jet-button wire:click="enviar" wire:loading.attr="disabled">
                        Enviar Solicitud
                    </x-jet-button>

                    <x-jet-dialog-modal wire:model="showModal">
                        <x-slot name="title" class="text-center">
                            INFORMACION DE CONYUGUE
                        </x-slot>
                        <x-slot name="content">
                            <div class="px-2 mb-3 last:mb-0">
                                <ul class="space-y-1 mt-2">
                                    <li class="py-3 rounded-lg bg-white text-gray-600 text-left">
                                        @if ($user)
                                            <p><span class="font-bold">Nombre:</span> {{ $user->name }}</p>
                                            <p><span class="font-bold">Correo:</span> {{ $user->email }}</p>
                                            <p><span class="font-bold">Genero:</span> {{ $user->genero=='M' ? 'MUJER' : 'HOMBRE' }}</p>
                                            <p><span class="font-bold">Equipo:</span> {{ count($user->descendants) }} personas</p>
                                            <p><span class="font-bold">Celulas Oficiales:</span> {{ count($user->recursiveCelulasTodas) }}</p>
                                            <p><span class="font-bold">Celulas Evangelisticas:</span> {{ count($user->recursiveEvangelisticasTodas) }} </p>
                                            <p><span class="font-bold">Visitas Pendientes CE:</span> {{ $visitas_pendientes }} </p>
                                            <p><span class="font-bold">CE Visitadas:</span> {{ $ce_visitadas }} </p>

                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </x-slot>
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                                {{ __('Close') }}
                            </x-jet-secondary-button>

                            <x-jet-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                                {{ __('Enviar Solicitud') }}
                            </x-jet-button>
                        </x-slot>
                    </x-jet-dialog-modal>

                </div>
            </div>
        @endif
    </div>

</div>
