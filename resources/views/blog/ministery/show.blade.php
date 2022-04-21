@extends('layouts.blog')
@section('title', 'MDC-Ministerio')

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
                            📰 <span class="hidden w-0 md:w-auto md:block pl-1">Mansion de Cristo - Ministerios</span>
                        </a>
                    </div>
                    <div class="flex w-1/2 justify-end content-center">
                        <p class="hidden sm:block mr-3 text-center h-14 p-4 text-xs"><span class="pr-2">Comparte
                                esto</span> 👉</p>
                        <a class="inline-block text-white no-underline hover:text-white hover:text-underline text-center h-10 w-10 p-2 md:h-auto md:w-16 md:p-4"
                            href="https://twitter.com/intent/tweet?url={{ route('blog.show_ministery', $ministery->slug) }}"
                            style="background-color:#33b1ff;">
                            <svg class="fill-current text-white h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path
                                    d="M30.063 7.313c-.813 1.125-1.75 2.125-2.875 2.938v.75c0 1.563-.188 3.125-.688 4.625a15.088 15.088 0 0 1-2.063 4.438c-.875 1.438-2 2.688-3.25 3.813a15.015 15.015 0 0 1-4.625 2.563c-1.813.688-3.75 1-5.75 1-3.25 0-6.188-.875-8.875-2.625.438.063.875.125 1.375.125 2.688 0 5.063-.875 7.188-2.5-1.25 0-2.375-.375-3.375-1.125s-1.688-1.688-2.063-2.875c.438.063.813.125 1.125.125.5 0 1-.063 1.5-.25-1.313-.25-2.438-.938-3.313-1.938a5.673 5.673 0 0 1-1.313-3.688v-.063c.813.438 1.688.688 2.625.688a5.228 5.228 0 0 1-1.875-2c-.5-.875-.688-1.813-.688-2.75 0-1.063.25-2.063.75-2.938 1.438 1.75 3.188 3.188 5.25 4.25s4.313 1.688 6.688 1.813a5.579 5.579 0 0 1 1.5-5.438c1.125-1.125 2.5-1.688 4.125-1.688s3.063.625 4.188 1.813a11.48 11.48 0 0 0 3.688-1.375c-.438 1.375-1.313 2.438-2.563 3.188 1.125-.125 2.188-.438 3.313-.875z">
                                </path>
                            </svg>
                        </a>
                        <a class="inline-block text-white no-underline hover:text-white hover:text-underline text-center h-10 w-10 p-2 md:h-auto md:w-16 md:p-4"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog.show_ministery', $ministery->slug) }}"
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
        {{-- NOMBRE --}}
        <div class=" text-center  container mx-auto">
            <input  value="{{ $ministery->name }}" id="titulo" hidden>
        </div>
        {{-- FOTO --}}
        {{-- <div class="max-w-6xl mx-auto bg-cover bg-fixed mt-8 rounded h-96"
            style="background-image:url('@if ($ministery->image) {{ asset('storage/' . $ministery->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif');">
        </div> --}}
        <div class="mx-auto container pb-5 px-2 lg:px-8  mt-8 bg-cover bg-fixed">
            <img class="w-full h-96"src="@if ($ministery->image) {{ asset('storage/' . $ministery->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt="">
        </div>
        {{-- CUERPO --}}
        <div class=" text-gray-700 font-sans quicksand pb-10">
            <div class="container mx-auto  px-7 sm:px-16 md:px-28  flex flex-wrap">
                <div class="w-full md:w-1/4 md:pr-7 order-3 md:order-1">
                    <div class="max-w-md md:float-right md:text-right leading-loose tracking-tight md:sticky md:top-0 ">
                        <p class="py-3  font-bold break-normal text-2xl md:text-4xl">Otros</p>

                        <ul class="flex flex-wrap justify-between flex-col">
                            @foreach ($similares as $ministerio)
                            <li>
                                <a href="{{ route('blog.show_ministery',$ministerio) }}" >{{ $ministerio->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('blog.ministery') }}" class="normal font-bold hover:font-bold"data-turbolinks="false">Mira todos los ministerios...</a>
                    </div>
                </div>
                <div class="w-full md:w-3/4 order-1 md:order-2">
                    <div class=" leading-loose tracking-tight">
                        <h1 class="py-3 font-bold break-normal text-3xl md:text-5xl">{{ $ministery->name }}</h1>
                        <p class="mb-5 text-justify">
                            {!! $ministery->extract !!}
                        </p>
                        <div class="text-justify">
                            {!! $ministery->body !!}
                        </div>
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
                <div class="grid  sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6 pb-6">
                    @foreach ($similares as $ministerio)
                        <div class="pt-4 grid-cols-2 shadow mt-5 text-sm relative max-w-64 border-0  rounded-lg break-words text-gray-800 flex flex-col"
                            style="background-color:white;">
                            <div class="py-0 z-10 mx-6 -mt-8 rounded-lg relative">
                                <a href="{{ route('blog.show_ministery', $ministerio->slug) }}"
                                    class="block bg-transparent leading-none m-0 p-0 z-20 relative">
                                    <!---->
                                    <img class="rounded-lg shadow"
                                        src="@if ($ministerio->image) {{ asset('storage/' . $ministerio->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
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
                            <div class=" mt-0  px-6  flex flex-wrap items-baseline ">

                                <h4
                                    class="mt-2  flex w-full text-lg leading-tight text-gray-700  hover:text-blue-800  font-bold font-serif ">
                                    <a
                                        href="{{ route('blog.show_ministery', $ministerio->slug) }}">{{ $ministerio->name }}</a>
                                </h4>

                            </div>

                            <div class="py-2 px-6 ">
                                <div class="flex-grow items-center  justify-between ">
                                    <h1 class="mb-3 text-gray-600 ">
                                        {{ Illuminate\Support\Str::limit($ministerio->extract, 120, '...') }}</h1>
                                </div>
                            </div>
                            <div class="lg:hidden px-6 pb-2">
                                <span
                                    class=" float-right font-bold text-sm text-gray-400">{{ $ministerio->created_at->toFormattedDateString() }}</span>
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
