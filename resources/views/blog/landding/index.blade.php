@extends('layouts.blog')

@section('title', 'Mansion de Cristo')

@section('main')
    <div>
        <div class="mx-auto container pb-5">
            {{-- CARRUSEL PRINCIPAL --}}
            <div class="swiper mySwiper p-5">
                <div class="swiper-wrapper">
                    {{-- PRIMERA IMAGEN --}}
                    <div class="swiper-slide ">
                        <article class="w-full h-96 opacity-90"
                            style="background-image: url({{ asset('images/primera.jpg') }})">
                            <div class="w-full h-full px-8 flex flex-col justify-center ">
                                <h1 class="text-4xl text-white leading-8 font-bold text-left">
                                    <a href="{{ route('blog.contact.index') }}">
                                        Envianos tu peticion <br> de oracion
                                    </a>
                                </h1>

                            </div>
                        </article>
                    </div>
                    {{-- PRIMERA --}}
                    @foreach ($announces as $post)
                        @if ($loop->first)
                            <div class="swiper-slide ">
                                <article class="w-full h-96 bg-cover bg-center  opacity-90"
                                    style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }}@else https://cdn.pixabay.com/photo/2022/01/26/05/56/stairs-6968125_960_720.jpg @endif)">
                                    <div class="w-full h-full px-8 flex flex-col justify-center ">
                                        <h1 class="text-4xl text-white leading-8 font-bold text-left">
                                            <a href="{{ route('blog.show_announces', $post) }}">
                                                {{ $post->name }}
                                            </a>
                                        </h1>

                                    </div>
                                </article>
                            </div>
                        @endif
                    @endforeach
                    @foreach ($teachings as $post)
                        @if ($loop->first)
                            <div class="swiper-slide ">
                                <article class="w-full h-96 bg-cover bg-center  opacity-90"
                                    style="background-image: url(@if ($post->image) {{ Storage::url($post->image->url) }}@else https://cdn.pixabay.com/photo/2022/01/26/05/56/stairs-6968125_960_720.jpg @endif)">
                                    <div class="w-full h-full px-8 flex flex-col justify-center ">
                                        <h1 class="text-4xl text-white leading-8 font-bold text-left">
                                            <a href="{{ route('blog.show_teaching', $post) }}">
                                                {{ $post->name }}
                                            </a>
                                        </h1>

                                    </div>
                                </article>
                            </div>
                        @endif
                    @endforeach
                    {{-- PETICION DE ORACION --}}
                    <div class="swiper-slide ">
                        <article class="w-full h-96 bg-cover bg-center  opacity-90"
                            style="background-image: url({{ asset('images/oracion.jpg') }})">
                            <div class="w-full h-full px-8 flex flex-col justify-center ">
                                <h1 class="text-4xl text-white leading-8 font-bold text-left">
                                    <a href="{{ route('blog.contact.index') }}">
                                        Envianos tu peticion <br> de oracion
                                    </a>
                                </h1>

                            </div>
                        </article>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

            {{-- NOTICIAS --}}
            <div class="max-w-3xl mx-auto text-center mt-8">
                <h2 class="h1 text-3xl border-l-black mb-4">Puedes Leer las Noticias <a class="text-cyan-900 font-bold"
                        href="{{ route('blog.testimony') }}">Mas Recientes</a>
                </h2>
                <p class="text-xl text-gray-600">
                    Conoce las noticias de interes mas recientes acerca de nuestra congregacion, si quieres puedes ver <a
                        class="text-cyan-900 font-bold" href="{{ route('blog.announces') }}">mas noticias aqui</a>.
                </p>
            </div>

            <div class=" pt-8 sm:px-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 ">
                @foreach ($announces as $anuncio)
                    <div class="px-6 flex justify-center hover:bg-gray-200">
                        <div class="" class="rounded-lg shadow-lg bg-white ">
                            <a href="{{ route('blog.show_announces', $anuncio) }}" data-mdb-ripple="true"
                                data-mdb-ripple-color="light">
                                <img src="{{ Storage::url($anuncio->image->url) }}" alt="" />
                            </a>
                            <div class="p-3">
                                <a href="{{ route('blog.show_announces', $anuncio) }}">
                                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $anuncio->name }}</h5>
                                </a>
                                {{-- <p class="text-gray-700 text-base ">
                                    {{ Illuminate\Support\Str::limit($anuncio->extract, 120, '...') }}
                                </p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- NOTICIAS --}}
            <div class="max-w-3xl mx-auto text-center mt-8">
                <h2 class="h1 text-3xl border-l-black mb-4">Puedes Leer las Enseñanzas <a class="text-cyan-900 font-bold"
                        href="{{ route('blog.teaching') }}">Mas Recientes</a>
                </h2>
                <p class="text-xl text-gray-600">
                    Conoce las enseñanzas de interes mas recientes acerca de nuestra congregacion, si quieres puedes ver <a
                        class="text-cyan-900 font-bold" href="{{ route('blog.announces') }}">mas noticias aqui</a>.
                </p>
            </div>

            <div class=" pt-8 sm:px-16">
                <ul class="mt-10  w-full flex overflow-x-auto gap-8 snap-x">
                    @foreach ($teachings as $anuncio)
                        <li class="snap-center">
                            <div class="relative flex-shrink-0  overflow-hidden rounded-3xl">
                                <img src="{{ Storage::url($anuncio->image->url) }}" alt=""
                                    class="absolute inset-0 w-full h-full object-fixed object-bottom" />
                                <div class="absolute inset-0  w-full h-full bg-gradient-to-br from-black/75"></div>
                                <div class=" relative h-72 w-80 p-12 flex flex-col justify-between items-start">
                                    <div>
                                        <p class="font-medium text-white">{{ $anuncio->name }}</p>
                                        <h2 class="mt-3 w-2/3 text-3xl font-semibold tracking-tight text-white">
                                            {{$anuncio->name}}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- PREGUNTAS FRECUENTES --}}
            <div class="container  mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <!--Left Col-->
                <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
                    <h1
                        class="my-4 text-3xl md:text-5xl from-green-400 via-pink-500  opacity-75 font-bold leading-tight text-center md:text-left">
                        Tienes preguntas?
                        <span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">
                            Algunas de las preguntas mas frecuentes
                        </span>
                        son:
                    </h1>
                    <div class="bg-gray-900 opacity-75 w-full shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <ul class="space-y-4" x-data="{ open: 120 }">
                                <li class="bg-white rounded-md overflow-hidden shadow-md">
                                    <button class="flex items-center w-full text-left p-4 bg-gray-50 border-b"
                                        x-on:click="open == 109 ? open = null : open = 109 ">
                                        <span class="text-xl font-semibold">
                                            ¿Donde queda la iglesia?
                                        </span>
                                    </button>

                                    <ul class="p-4" x-show="open == 109" x-transition:enter=""
                                        style="display: none;">
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Introducción a componentes
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Pasar datos a componentes (props)
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Emitir eventos
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Emitir eventos II
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Slots
                                            </span>

                                        </li>
                                    </ul>
                                </li>
                                <li class="bg-white rounded-md overflow-hidden shadow-md">
                                    <button class="flex items-center w-full text-left p-4 bg-gray-50 border-b"
                                        x-on:click="open == 110 ? open = null : open = 110 ">
                                        <span class="text-xl font-semibold">
                                            ¿Cual es la Vision y Mision de la iglesia?
                                        </span>
                                    </button>

                                    <ul class="p-4" x-show="open == 110" x-transition:enter=""
                                        style="display: none;">
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                ¿Quienes son los pastores de la iglesia
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Analizar proyecto
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Crear nuestro primer componente
                                            </span>

                                        </li>
                                    </ul>
                                </li>
                                <li class="bg-white rounded-md overflow-hidden shadow-md">
                                    <button class="flex items-center w-full text-left p-4 bg-gray-50 border-b"
                                        x-on:click="open == 112 ? open = null : open = 112 ">
                                        <span class="text-xl font-semibold">
                                            ¿Quienes son los pastores de la iglesia?
                                        </span>
                                    </button>

                                    <ul class="p-4" x-show="open == 112" x-transition:enter=""
                                        style="display: none;">
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Instalar Vue Router
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Analizar el funcionamiento de Vue Router
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Crear nueva ruta
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Rutas con parametros
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Pasar dos parametros
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Ruta 404 Not Found
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Sintaxis de coincidencia de rutas
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Rutas con parámetros opcionales
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Rutas anidadas
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Rutas con nombre
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Redirecciones
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Recibir parametros de la url dentro de props
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Diferentes modos history
                                            </span>

                                        </li>
                                        <li class="flex md:items-center justify-between">
                                            <span>
                                                <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                                Ciclos de vida
                                            </span>

                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Right Col-->
                <div class="w-full xl:w-3/5 p-12 overflow-hidden">
                    <img class="rounded-lg mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
                        src="{{ asset('images/safe.jpg') }}" />
                </div>

            </div>

            {{-- TESTIMONIOS --}}
            <section class="relative p-9">
                <div class="absolute inset-0 top-1/2 md:mt-24 lg:mt-0 bg-gray-800 pointer-events-none" aria-hidden="true">
                </div>

                <div class="relative max-w-6xl mx-auto px-4 sm:px-6 ">
                    <div class="py-12 md:py-20">
                        <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20">
                            <h2 class="h1 text-3xl border-l-black mb-4">Puedes Leer los Testimonios <a
                                    class="text-cyan-900 font-bold" href="{{ route('blog.testimony') }}">Mas
                                    Recientes</a>
                            </h2>
                            <p class="text-xl text-gray-600">
                                Contemos las historias que inspiren a otras personas seguir creyendo por su milagro. Tu
                                testimonio las puede llenar de fe a otro, <a class="text-cyan-900 font-bold"
                                    href="{{ route('blog.contact.index') }}">compártelo aqui</a>.
                            </p>
                        </div>
                        <div
                            class="max-w-sm mx-auto grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-none">
                            @foreach ($testimonies as $testimony)
                                <div class="relative flex flex-col items-center p-6 bg-white rounded shadow-xl">
                                    <div class="flex justify-center">
                                        <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500"
                                            src="@if ($testimony->image) {{ asset('storage/' . $testimony->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif">
                                    </div>
                                    <h4 class="text-xl font-bold leading-snug tracking-tight mb-1 text-center"><a
                                            class="hover:to-blue-700"
                                            href="{{ route('blog.show_testimony', $testimony) }}">{{ $testimony->name }}</a>
                                    </h4>
                                    <p class="text-gray-600 text-center">
                                        {{ Illuminate\Support\Str::limit($testimony->extract, 100, '...') }}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </section>
            <br>

            <article class="h-48 bg-cover bg-center  opacity-90 "
                style="background-image: url(https://scontent-mia3-1.xx.fbcdn.net/v/t31.18172-8/19956778_1571614339535696_8406627501244755415_o.jpg?_nc_cat=106&ccb=1-5&_nc_sid=cdbe9c&_nc_ohc=xKeKBu8vXT0AX_3kgAd&_nc_ht=scontent-mia3-1.xx&oh=00_AT_xPYsyfhDT40tmzuXut1OjwA8izTF2iTqUAHjJh9znAQ&oe=6288EDAB)">
                <div class="flex flex-col justify-center">
                    <div class="text-center">

                        <div class="pt-6 px-8 ">
                            <h1 class="text-6xl text-black font-mono ">
                                SERVICIOS
                            </h1>
                        </div>
                        <div class="px-8 ">
                            <h1 class="text-3xl text-gray-900 font-mono ">
                                Domingos
                            </h1>
                            <h1 class="text-3xl text-gray-900 font-mono ">
                                8:00 a.m. / 10:00 a.m.
                            </h1>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/carrusel.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection

@section('footer')
    @include('components.footerT')
@endsection