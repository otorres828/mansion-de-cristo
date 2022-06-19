<div
    class="mr-3 ml-3 
            -mt-64
            xl:mx-32
            relative
            rounded-lg
            bg-gray-100 ">
    <div class="@if (count($teachings) == 0) hidden @endif absolute inset-0 top-1/2 md:mt-24 lg:mt-0 bg-gray-800 pointer-events-none"
        aria-hidden="true">
    </div>
    <div class="pt-5 mb-10 shadow-lg">
        <div class="max-w-6xl mx-auto px-6 sm:px-6 lg:px-6">
            <div class=" text-center pb-3 pt-3">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl  text-yellow-600  ">
                    Conoce Las Enseñanzas que Cambiaran Tu Vida
                </h1>
            </div>

            <div class="grid grid-cols-5 py-5">
                <div class="col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2">
                    <h5 class=" text-gray-600 text-center text-2xl ">
                        <strong>Encuentra las mejores enseñanzas</strong>
                    </h5>
                </div>
                <div class="col-span-5 sm:col-span-5 md:col-span-3 lg:col-span-3">
                    @livewire('blog.search-teachings')
                </div>
            </div>
            <div class="grid-cols-5 pb-5 flex items-center justify-between">
                {{-- TODAS LAS CATEGORIAS --}}
                <div class="xl:w-96 rounded-lg border-1  border-light-blue-500 ">
                    <select wire:model="search"
                        class=" block  w-full rounded  
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        ">
                        <option class="text-base sm:text-xl" value="todaslascategorias">Todas las Categoria</option>
                        @foreach ($categorias as $categoria)
                            <option class="text-base sm:text-xl" value="{{ $categoria->id }}" class="">
                                {{ $categoria->name }}</option>
                        @endforeach
                    </select>

                </div>
                {{-- TODOS LOS AUTORES --}}
                <div wire:model="autors" class="ml-2 xl:w-96 rounded-lg border-1  border-light-blue-500 ">
                    <select
                        class="
                        block  w-full rounded  
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                        <option value="todoslosautores" class="text-base sm:text-xl">Todos los Autores</option>
                        @foreach ($autores as $autor)
                            <option class="text-base sm:text-xl" value="{{ $autor->id }}" class="">
                                {{ $autor->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pb-6">
                @foreach ($teachings as $teaching)
                    <div class="pt-4 grid-cols-2 shadow mt-5 text-sm relative max-w-64 border-0  rounded-lg break-words text-gray-800 flex flex-col"
                        style="background-color:white;">
                        <div class="py-0 z-10 mx-6 -mt-8 rounded-lg relative">
                            <a href="{{ route('blog.show_teaching', $teaching->slug) }}"
                                class="block bg-transparent leading-none m-0 p-0 z-20 relative">
                                <!---->
                                <img class="rounded-lg shadow"
                                    src="@if ($teaching->image)https://mdc.nyc3.cdn.digitaloceanspaces.com/{{$teaching->image->url}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
                                    alt="Card image cap">
                            </a>

                        </div>
                        <div class="w-full text-center relative mt-4 px-6">
                            <div class="bg-gray-300 rounded overflow-hidden shadow h-1">
                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                    class="bg-green progress-bar h-1" style="width: 0%;">
                                </div>
                            </div>
                        </div>
                        {{-- FILTRADO POR CATEGORIA BOTON VERDE --}}
                        <div class=" mt-0 px-6  flex flex-wrap items-baseline ">
                            <h4
                                class="mt-2  flex w-full text-lg leading-tight text-gray-700  hover:text-blue-800  font-bold font-serif ">
                                <a
                                    href="{{ route('blog.show_teaching', $teaching->slug) }}">{{ $teaching->name }}</a>
                            </h4>
                            <div wire:click="filtro({{ $teaching->category_id }})"
                                class="mt-2 p-1 w-auto rounded text-xs   shadow-lg  uppercase font-serif text-white bg-green-800">
                                <button type="button" class="text-1xl p-1">{{ $teaching->category->name }}</button>
                            </div>
                        </div>

                        <div class="py-2 px-6 ">
                            <div class="flex-grow items-center  justify-between ">
                                <h1 class="mb-3 text-gray-600 ">
                                    {{ Illuminate\Support\Str::limit($teaching->extract, 200, '...') }}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($teachings))
                <div class="pb-5">
                    {{ $teachings->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
