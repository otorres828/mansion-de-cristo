{{-- <div  class="mr-3 ml-3
            z-10
            mb-10
            -mt-64
            xl:mx-32
            relative
            rounded-lg
            bg-gray-100
            shadow">
    <div class="pt-5 pb-5 shadow-lg">
        <div class="max-w-6xl mx-auto px-6 sm:px-6 lg:px-6 ">
            <div class=" text-center pb-3 pt-3">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-700">
                    Conoce Los ultimos anuncios de MDC
                </h1>
            </div>

            <div class="grid grid-cols-5 py-5">
                <div class="col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2">
                    <h5 class=" text-gray-600 text-center text-2xl ">
                        <strong>Encuentra un anuncio por su titulo</strong>
                    </h5>   
                </div>
                <div class="col-span-5 sm:col-span-5 md:col-span-3 lg:col-span-3">
                    @livewire("blog.search-announces")
                </div>    
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 pb-6">
                @foreach ($announces as $announce)
                    <div class="pt-4 grid-cols-2 shadow mt-5 text-sm relative max-w-64 border-0  rounded-lg break-words text-gray-800 flex flex-col" style="background-color:white;">
                        <div class="py-0 z-10 mx-6 -mt-8 rounded-lg relative">
                            <a href="{{route('blog.show_announces',$announce->slug)}}" class="block bg-transparent leading-none m-0 p-0 z-20 relative"><!----> 
                                <img class="rounded-lg shadow" src="@if ($announce->image){{asset('storage/'.$announce->image->url)}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt="Card image cap">
                            </a> 
                                  
                        </div> 
                        <div class="w-full text-center relative mt-4 px-6">
                            <div class="bg-gray-300 rounded overflow-hidden shadow h-1">
                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="bg-green progress-bar h-1" style="width: 0%;">
                                </div>
                            </div>
                        </div> 
                        <div class=" mt-0  px-6  flex flex-wrap items-baseline "> 
                             
                            <h4 class="mt-2  flex w-full text-lg leading-tight text-gray-700  hover:text-blue-800  font-bold font-serif ">
                                <a href="{{route('blog.show_announces',$announce->slug)}}">{{$announce->name}}</a>
                            </h4> 
                           
                        </div>

                        <div class="py-2 px-6 ">
                            <div class="flex-grow items-center  justify-between ">
                                <h1 class="mb-3 text-gray-600 ">{{$announce->extract}}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$announces->links()}}
        </div>
    </div>    
</div> --}}

<div class="container grid grid-cols-10 py-22 px-6 sm:px-6 lg:px-28 mx-auto z-10 mb-10 -mt-64 relative">
    <div class="col-span-12 mx-auto px-14 text-center z-40 relative">
        <p class="font-serif  text-3xl lg:text-6xl text-gray-50">Seccion de Noticias</p>
        <div class="w-full text-center  mt-3">
            <div class="bg-gray-300 rounded overflow-hidden ">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                    class="bg-green progress-bar h-1" style="width: 0%;">
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-10 lg:hidden w-full mx-auto px-2 pt-0 z-20">
        <div class="col-span-10 pb-3">
            <h5 class=" text-gray-50 md:text-gray-800 text-center text-4xl ">
                <strong>Encuentra una noticia</strong>
            </h5>
        </div>
        <div class="w-full text-center  py-3">
            <div class="bg-gray-300 rounded overflow-hidden ">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                    class="bg-green progress-bar h-1" style="width: 0%;">
                </div>
            </div>
        </div>
        @livewire('blog.search-announces')
    </div>

    <div class="w-full col-span-10 lg:col-span-7 md:mx-auto z-10">
        @foreach ($announces as $anuncio)
            <div class="mx-auto py-8 lg:py-12">
                <a href="{{ route('blog.show_announces', $anuncio->slug) }}" data-turbolinks="false"
                    class="block bg-transparent leading-none m-0 p-0 z-20 relative">
                    <!---->
                    <img class="rounded-3xl shadow w-full h-96"
                        src="@if ($anuncio->image) {{ imagenes_storage($anuncio->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
                        alt="">
                </a>
                <div class=" pt-5">
                    <a href="{{ route('blog.show_announces', $anuncio->slug) }}" data-turbolinks="false"
                        class="mt-0  px-2  flex flex-wrap items-baseline hover:text-indigo-600 text-gray-800 lg:text-3xl md:text-2xl font-bold my-2">{{ $anuncio->name }}</a>
                    <p class="text-gray-700 m-3 text-justify">
                        {{ Illuminate\Support\Str::limit($anuncio->extract, 200, '...') }}</p>
                    <div class="flex justify-between  m-3">
                        <span
                            class="font-bold text-sm text-gray-400">{{ $anuncio->created_at->toFormattedDateString() }}</span>
                    </div>
                    <div class="w-full text-center  ">
                        <div class="bg-gray-300 rounded overflow-hidden ">
                            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                class="bg-green progress-bar h-1" style="width: 0%;">
                            </div>
                        </div>
                    </div>
                    <div class="float-right  m-3">
                        <a href="{{ route('blog.show_announces', $anuncio->slug) }}" data-turbolinks="false"
                            class="text-sm hover:text-indigo-600 text-gray-800 text-1xl font-bold my-2">Leer mas</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container mx-auto md:gap-0  py-8 ">
            {{ $announces->onEachSide(4)->links() }}
        </div>
    </div>

    <div class="hidden md:block col-span-3 mx-auto ml-5 pt-12 z-20 " wire:ignore>
        <div class="sticky top-10">
            <div class="col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2 text-center">
                <h5
                    class="mt-3 text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 via-cyan-400 to-cyan-300">
                    Encuentra una Noticia
                </h5>
            </div>
            <div class="w-full text-center  py-3 ">
                <div class="bg-gray-300 rounded overflow-hidden ">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                        class="bg-green progress-bar h-1" style="width: 0%;">
                    </div>
                </div>
            </div>
            <div class="bg-indigo-900 text-center py-4 lg:px-4 mb-4">
                <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                    role="alert">
                    <span class="font-semibold  text-center flex-auto">No te pierdas de las noticias mas recientes de
                        nuestra congregacion</span>
                    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                    </svg>
                </div>
            </div>
            @livewire('blog.search-announces')
            <div class="pb-5 col-span-5 sm:col-span-5 md:col-span-2 lg:col-span-2 text-center">
                <h5
                    class="mt-3 text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 via-cyan-400 to-cyan-300">
                    Tal vez te pueda interesar
                </h5>

            </div>
            @foreach ($similares as $similar)
                <article
                    class="mb-3 transition duration-300 hover:opacity-80 rounded-lg shadow w-full h-30 bg-cover bg-center "
                    style="background-image: url(@if ($similar->image) {{ imagenes_storage($similar->image->url) }}@else https://cdn.pixabay.com/photo/2022/01/26/05/56/stairs-6968125_960_720.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center text-center">
                        <h1
                            class="transition duration-300 rounded-lg text-2xl text-white leading-8 font-bold p-3 hover:bg-sky-800">
                            <a href=" {{ route('blog.show_testimony', $similar) }}">
                                {{ $similar->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach

        </div>
    </div>

</div>
