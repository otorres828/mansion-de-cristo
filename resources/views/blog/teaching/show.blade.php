@extends('layouts.blog')
@section('title', 'MDC-Enseñanzas')

@section('head')
    <style>
        .smooth {
            transition: box-shadow 0.3s ease-in-out;
        }

        ::selection {
            background-color: aliceblue
        }

    </style>
@endsection

@section('main')
    <div class="bg-white font-sans leading-normal tracking-normal">
        <div id="header" class="bg-white fixed w-full z-20 top-0 hidden animated" style="opacity: .95;">
            <div class="bg-white">
                <div class="flex flex-wrap items-center content-center">
                    <div class="flex w-1/2 justify-start text-white font-extrabold">
                        <a class="flex text-gray-900 no-underline hover:text-gray-900 hover:no-underline pl-2" href="#">
                            📰 <span class="hidden w-0 md:w-auto md:block pl-1">Mansion de Cristo - Enseñanzas</span>
                        </a>
                    </div>
                    <div class="flex w-1/2 justify-end content-center">
                        <p class="hidden sm:block mr-3 text-center h-14 p-4 text-xs"><span class="pr-2">Comparte
                                esto</span> 👉</p>
                        <a class="inline-block text-white no-underline hover:text-white hover:text-underline text-center h-10 w-10 p-2 md:h-auto md:w-16 md:p-4"
                            href="https://twitter.com/intent/tweet?url={{ route('blog.show_teaching', $teaching->slug) }}"
                            style="background-color:#33b1ff;">
                            <svg class="fill-current text-white h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path
                                    d="M30.063 7.313c-.813 1.125-1.75 2.125-2.875 2.938v.75c0 1.563-.188 3.125-.688 4.625a15.088 15.088 0 0 1-2.063 4.438c-.875 1.438-2 2.688-3.25 3.813a15.015 15.015 0 0 1-4.625 2.563c-1.813.688-3.75 1-5.75 1-3.25 0-6.188-.875-8.875-2.625.438.063.875.125 1.375.125 2.688 0 5.063-.875 7.188-2.5-1.25 0-2.375-.375-3.375-1.125s-1.688-1.688-2.063-2.875c.438.063.813.125 1.125.125.5 0 1-.063 1.5-.25-1.313-.25-2.438-.938-3.313-1.938a5.673 5.673 0 0 1-1.313-3.688v-.063c.813.438 1.688.688 2.625.688a5.228 5.228 0 0 1-1.875-2c-.5-.875-.688-1.813-.688-2.75 0-1.063.25-2.063.75-2.938 1.438 1.75 3.188 3.188 5.25 4.25s4.313 1.688 6.688 1.813a5.579 5.579 0 0 1 1.5-5.438c1.125-1.125 2.5-1.688 4.125-1.688s3.063.625 4.188 1.813a11.48 11.48 0 0 0 3.688-1.375c-.438 1.375-1.313 2.438-2.563 3.188 1.125-.125 2.188-.438 3.313-.875z">
                                </path>
                            </svg>
                        </a>
                        <a class="inline-block text-white no-underline hover:text-white hover:text-underline text-center h-10 w-10 p-2 md:h-auto md:w-16 md:p-4"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog.show_teaching', $teaching->slug) }}"
                            style="background-color:#005e99">
                            <svg class="fill-current text-white h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path d="M19 6h5V0h-5c-3.86 0-7 3.14-7 7v3H8v6h4v16h6V16h5l1-6h-6V7c0-.542.458-1 1-1z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
            <!--Progress bar-->
            <div id="progress" class="h-1 bg-white shadow"
                style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>
        </div>

        <div class=" text-center pt-10 md:pt-20 container mx-auto">
            <p class=" md:text-2xl text-green-500 font-bold">{{ $teaching->created_at->toFormattedDateString() }}</p>
            <h1 class="sm:m-5 font-bold break-normal text-3xl md:text-5xl">{{ $teaching->name }}</h1>
            <input  value="{{ $teaching->name }}" id="titulo" hidden>

        </div>

        <div class="max-w-6xl mx-auto bg-cover mt-8 rounded"
            style="background-image:url('@if ($teaching->image) {{ asset('storage/' . $teaching->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif');min-height: 100vh;">
        </div>

        {{-- CUERPO DE LA NOTICIA --}}
        <div class="container max-w-5xl mx-auto -mt-32">
            <div class="mx-0 sm:mx-6">
                <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal"
                    style="font-family:Georgia,serif;">
                    <!--Lead Para-->
                    <p class="text-2xl md:text-3xl mb-5 text-justify">
                        {{ $teaching->extract }}
                    </p>
                    <div class="prose md:prose-lg lg:prose-xl select-none text-justify">
                        {!! $teaching->body !!}
                    </div>
                    <blockquote class="pt-4 border-l-4 border-green-500 italic my-8 pl-8 md:pl-12"><strong>Autor:
                        </strong>{{ $teaching->user->name }}</blockquote>

                </div>

                <form action="#">
                    <div class="container font-sans bg-green-100 rounded p-4 md:p-24 text-center mx-auto">
                        <h2 class="font-bold break-normal text-2xl md:text-4xl">Subscribete</h2>
                        <h3 class="font-bold break-normal  text-gray-600 text-base md:text-xl">Se el primero en obtener las
                            ultimas enseñanzas de MDC</h3>
                        <div class="w-full text-center pt-4">
                            <div class="max-w-sm mx-auto p-1 pr-0 flex flex-wrap items-center">
                                <input type="email" placeholder="olivertorres@example.com"
                                    class="flex-1 appearance-none rounded shadow p-3 text-gray-600 mr-2 focus:outline-none">
                                <button type="submit"
                                    class="flex-1 mt-4 md:mt-0 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">SUBSCRIBIRSE</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="flex w-full items-center font-sans p-8 md:p-24">
                    <img class="w-10 h-10 rounded-full mr-4"
                        src="@if ($teaching->image) {{ asset('storage/' . $teaching->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
                        alt="Avatar of Author">
                    <div class="flex-1">
                        <p class="text-base font-bold md:text-xl lg:text-3xl leading-none">VER MAS ENSEÑANZAS</p>
                        <p class="text-gray-600 text-xs md:text-base">Si necesitas, no dudes en contactarnos a <a
                                class="text-gray-800 hover:text-green-500 no-underline border-b-2 border-green-500"
                                href="{{ route('landding.index') }}">olivertorres1997@gmail.com.com</a></p>
                    </div>
                    <div class="justify-end">
                        <a href="{{ route('blog.teaching') }}"
                            class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Leer
                            Mas</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- SIMILARES --}}
        <div class="bg-gray-200">
            <div class=" text-center pt-10 md:pt-10 container mx-auto">
                <h1 class=" text-green-500 font-bold break-normal text-3xl md:text-5xl">Tal vez te pueda interesar</h1>
            </div>
            <div class="grid grid-flow-row  container w-full max-w-6xl mx-auto px-2 py-8">
                <div class="grid  sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 pb-6 snap-x">
                    @foreach ($similares as $teaching)
                        <div class="snap-center pt-4 grid-cols-2 shadow mt-5 text-sm relative max-w-64 border-0  rounded-lg break-words text-gray-800 flex flex-col"
                            style="background-color:white;">
                            <div class="py-0 z-10 mx-6 -mt-8 rounded-lg relative">
                                <a href="{{ route('blog.show_teaching', $teaching->slug) }}"
                                    class="block bg-transparent leading-none m-0 p-0 z-20 relative">
                                    <!---->
                                    <img class="rounded-lg shadow"
                                        src="@if ($teaching->image) {{ asset('storage/' . $teaching->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
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
                            <div class=" mt-0 px-6  flex flex-wrap items-baseline ">

                                <h4
                                    class="mt-2  flex w-full text-lg leading-tight text-gray-700  hover:text-blue-800  font-bold font-serif ">
                                    <a href="{{ route('blog.show_teaching', $teaching->slug) }}">{{ $teaching->name }}</a>
                                </h4>
                                <div wire:click="filtro({{ $teaching->category_id }})"
                                    class="mt-2 p-1 w-auto rounded text-xs   shadow-lg  uppercase font-serif text-white bg-green-800">
                                    <button type="button" class="text-1xl p-1">{{ $teaching->category->name }}</button>
                                </div>
                            </div>

                            <div class="py-2 px-6 ">
                                <div class="flex-grow items-center  justify-between ">
                                    <h1 class="mb-3 text-gray-600 ">
                                        {{ Illuminate\Support\Str::limit($teaching->extract, 120, '...') }}</h1>
                                </div>
                            </div>
                            <div class="lg:hidden px-6 pb-2">
                                <span
                                    class=" float-right font-bold text-sm text-gray-400">{{ $teaching->created_at->toFormattedDateString() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

@endsection

@section('js')
@include('components.aminblog.show')
    
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script type="text/javaScript">
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('admin.blog.estadisticas.registrar') }}",
                dataType: "POST",
                data: {
                    pagina: document.getElementById("titulo").value,
                    url:window.location.href,
                },
                sucess: function(resp) {
                    datos = JSON.parse(resp);
                }
            })
        })
    </script>
@endsection

@section('footer')
    @include('components.footerT')
@endsection
