<!-- Search button -->
<div x-data="{ searchOpen: false }">
    <!-- Button -->
    <button
        class="text-xs sm:text-sm mr-2 md:text-lg  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 transition duration-150 rounded"
        :class="{ 'bg-slate-200': searchOpen }"
        @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
        aria-controls="search-modal">
            Agregar Celula
    </button>
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

                <div class="px-2 mb-3 last:mb-0">
                    <div class="text-xs font-semibold text-slate-400 uppercase px-2 my-3 text-center">Agregar Celula</div>

                    <form action="{{route('celulas.store')}}" method="post">
                        @csrf

                        <div class="my-2 text-sm font-semibold  uppercase mb-2">Introduzca el nombre del anfitrion</div>
                        <input type="text" name="anfitrion" class="h-50 w-full rounded-lg shadow-lg" />
                        
                        <div class="my-2 text-sm font-semibold  uppercase mb-2">Introduzca la ubicacion</div>
                        <textarea name="ubicacion" class="h-50 w-full rounded-lg shadow-lg"></textarea>
                        
                        <div class="my-2 text-sm font-semibold  uppercase mb-2">Introduzca la el numero de telefono</div>
                        <input name="telefono" type="text"class="h-50 w-full rounded-lg shadow-lg" />
                        
                        <button type="submit" class="actualizar disabled:opacity-40  mt-6 w-full text-center flex-1 bg-blue-500 hover:bg-blue-700 text-white hover:to-blue-500 p-2 rounded">Agregar Celula</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
