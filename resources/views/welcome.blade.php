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

            <div class="pt-8">
                @livewire('blog.landding.notice')
            </div>

            {{-- ENSEÑANZAS --}}
            <div class="max-w-3xl mx-auto text-center mt-8">
                <h2 class="h1 text-3xl border-l-black mb-4">Puedes Leer las Enseñanzas <a class="text-cyan-900 font-bold"
                        href="{{ route('blog.announces') }}">Mas Recientes</a>
                </h2>
                <p class="text-xl text-gray-600">
                    Conoce las enseñanzas de interes mas recientes acerca de nuestra congregacion, si quieres puedes ver <a
                        class="text-cyan-900 font-bold" href="{{ route('blog.announces') }}">mas noticias aqui</a>.
                </p>
            </div>

            <div class="pt-8">
                @livewire('blog.landding.teaching')
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
                    <div class="bg-gray-900 opacity-75 w-full shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 ">
                        <div class="mb-4 ">
                            <ul class="space-y-4 " x-data="{ open: 120 }">
                                <li class="bg-white rounded-md overflow-hidden shadow-md transition-all duration-700">
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
                        src="{{ asset('images/safe.jpg') }}" alt="https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg"/>
                </div>

            </div>

            {{-- TESTIMONIOS --}}
            <section class="relative pt-16">
                {{-- <div class="absolute inset-0 top-1/2 md:mt-24 lg:mt-0 bg-gray-800 pointer-events-none" aria-hidden="true">
                </div> --}}

                <div class="relative  mx-auto ">
                    <div class="max-w-3xl mx-auto text-center  md:pb-16  px-4 sm:px-6">
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
                    @livewire('blog.landding.testimony')
                </div>
            </section>
            <br>
             
            {{-- SUSCRIPCION
            <form action="{{ route('suscripcion') }}" class="pb-16" method="POST">
                @csrf
                <div class="container font-sans bg-green-100 rounded p-4 md:p-24 text-center mx-auto">
                    <h2 class="font-bold break-normal text-2xl md:text-4xl">Subscribete</h2>
                    <h3 class="font-bold break-normal  text-gray-600 text-base md:text-xl">Se el primero en obtener las ultimas noticias de MDC</h3>
                    <div class="w-full text-center pt-4">
                        <div class="max-w-sm mx-auto p-1 pr-0 flex flex-wrap items-center">
                            <input type="email" name="email" placeholder="olivertorres@example.com" class="flex-1 appearance-none rounded shadow p-3 text-gray-600 mr-2 focus:outline-none">
                            <button type="submit" class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">SUBSCRIBIRSE</button>
                        </div>
                    </div>
                </div>
            </form>   --}}
          
            <br>
            <article class="h-48 bg-cover bg-center  opacity-90 "
                style="background-image: url({{ asset('images/bajocielosabiertos.jpg') }})">
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('js')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".general", {
            slidesPerView: 1,
            spaceBetween: 0,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                },
            },

            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next-next",
                prevEl: ".next-prev",
            },
        });
        var swiper = new Swiper(".testimonio", {
            slidesPerView: 1,
            spaceBetween: 0,
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },

            },

            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".next-next",
                prevEl: ".next-prev",
            },
        });

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

