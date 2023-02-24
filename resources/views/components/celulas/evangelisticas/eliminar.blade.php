@props(['celula'])
<div x-data="{ searchOpen: false }">
    <!-- Button -->
    <p class="cursor-pointer ont-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3 hover:bg-gray-200"
        :class="{ 'bg-slate-200': searchOpen }"
        @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
        aria-controls="search-modal">
        Eliminar
    </p>
    <!-- Modal backdrop -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity" x-show="searchOpen"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak></div>
    <!-- Modal dialog -->
    <div id="search-modal"
        class="fixed inset-0 z-50 overflow-hidden flex items-start top-20 mb-4 justify-center px-4 sm:px-6"
        role="dialog" aria-modal="true" x-show="searchOpen" x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4" x-cloak>
        <div class="bg-white overflow-auto max-w-2xl w-full max-h-full rounded shadow-lg"
            @click.outside="searchOpen = false" @keydown.escape.window="searchOpen = false">
            <!-- Search form -->

            <div class="py-4 px-2">

                <!-- Recent searches -->
                <div class="px-2 mb-3 last:mb-0">
                    <p class="mx-7 text-xs font-semibold text-slate-400 uppercase px-2 my-3 text-center">Eliminar Celula
                    </p>

                    <input type="hidden" name="user_id" class="h-50 w-full rounded-lg shadow-lg"
                        value="{{ Auth::user()->id }}" />

                    <div class="my-2 text-xl text-center font-semibold  uppercase mb-2">¿Seguro que quieres eliminar
                        esta celula evangelistica?</div>

                    <div class="flex justify-center px-14">
                        <form class="destroy" action="{{ route('celulas.destroy', $celula) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="mr-2 mt-6  text-center  bg-blue-500 hover:bg-blue-700 text-white hover:to-blue-500 p-2 rounded">Eliminar</button>
                        </form>
                        <button @click.prevent="searchOpen = false" type="submit"
                            class="mt-6  text-center  bg-red-500 hover:bg-red-700 text-white hover:to-red-500 p-2 rounded">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
