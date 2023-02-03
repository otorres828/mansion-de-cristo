<div class="mr-3 ml-3 z-10 mb-10 -mt-64 xl:mx-32 relative rounded-lg bg-gray-100 shadow">

    <div class="@if (count($ministeries) == 0) hidden @endif absolute inset-0 top-1/2 md:mt-24 lg:mt-0 bg-gray-800 pointer-events-none"
        aria-hidden="true">
    </div>
    <div class="pt-5 pb-5 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 ">
            <div class=" text-center pb-3 pt-3">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-blue-400 to-blue-300">
                    Conoce Los Ministerios de MDC
                </h1>
            </div>
            <div class="py-2 col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2">
                <h5 class=" text-gray-600 text-center text-2xl ">
                    <strong>Puedes filtrar tu busqueda por Ministerios o Departamentos</strong>
                </h5>
            </div>

            <div class="grid grid-cols-5 py-5">
                {{-- SELECT POR TIPO MINSITERIO/DEPARTAMENTO --}}
                <div class="col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2  justify-between pb-3 ">
                    <div class="xl:w-96 rounded-lg border-1  border-light-blue-500 ">
                        <select wire:model="tipo"
                            class=" block  w-full rounded  
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                            ">
                            <option class="text-base sm:text-xl" value="todos">Todos los Ministerios y Departamentos
                            </option>
                            <option class="text-base sm:text-xl" value="1" class="">Solo Ministerios
                            </option>
                            <option class="text-base sm:text-xl" value="2" class="">Solo Departamentos
                            </option>
                        </select>

                    </div>

                </div>

                {{-- BUSCADOR --}}
                <div class="col-span-5 sm:col-span-5 md:col-span-3 lg:col-span-3">
                    @livewire('blog.search-ministeries')
                </div>
            </div>

            {{-- TODAS LAS TARJETAS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 pb-6">
                @foreach ($ministeries as $ministery)
                    <div class="pt-4 grid-cols-2 shadow mt-5 text-sm relative max-w-64 border-0  rounded-lg break-words text-gray-800 flex flex-col"
                        style="background-color:white;">
                        <div class="py-0 z-10 mx-6 -mt-8 rounded-lg relative">
                            <a href="{{ route('blog.show_ministery', $ministery->slug) }}" data-turbolinks="false"
                                class="block bg-transparent leading-none m-0 p-0 z-20 relative">
                                <!---->
                                <img class="rounded-lg shadow"
                                    src="@if ($ministery->image){{ imagenes_storage($ministery->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
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
                                <a data-turbolinks="false"
                                    href="{{ route('blog.show_ministery', $ministery->slug) }}">{{ $ministery->name }}</a>
                            </h4>
                            @if ($ministery->type == 1)
                                <div wire:click="filtro({{ $ministery->type }})"
                                    class="mt-2 p-1 w-auto rounded text-xs   shadow-lg  uppercase font-serif text-white bg-cyan-500">
                                    <button type="button" class="text-1xl p-1 ">Ministerio</button>
                                </div>
                            @else
                                <div wire:click="filtro({{ $ministery->type }})"
                                    class="mt-2 p-1 w-auto rounded text-xs   shadow-lg  uppercase font-serif text-white bg-amber-700">
                                    <button type="button" class="text-1xl p-1">Departamento</button>
                                </div>
                            @endif
                        </div>
                        <div class="py-2 px-6">
                            <div class="flex-grow items-center  justify-between ">
                                <h1 class="mb-3 text-gray-600 ">
                                    {{ Illuminate\Support\Str::limit($ministery->extract, 100, '...') }}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $ministeries->links() }}
        </div>
    </div>
</div>
