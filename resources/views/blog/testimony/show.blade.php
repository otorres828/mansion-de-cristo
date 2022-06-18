@extends('layouts.blog')
@section('title', 'MDC-Testimonios')


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
                            📰 <span class="hidden w-0 md:w-auto md:block pl-1">Mansion de Cristo - Testimonios</span>
                        </a>
                    </div>
                    <div class="flex w-1/2 justify-end content-center">
                        <p class="hidden sm:block mr-3 text-center h-14 p-4 text-xs"><span class="pr-2">Comparte
                                esto</span> 👉</p>
                        <a class="inline-block text-white no-underline hover:text-white hover:text-underline text-center h-10 w-10 p-2 md:h-auto md:w-16 md:p-4"
                            href="https://twitter.com/intent/tweet?url={{ route('blog.show_testimony', $testimony->slug) }}"
                            style="background-color:#33b1ff;">
                            <svg class="fill-current text-white h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path
                                    d="M30.063 7.313c-.813 1.125-1.75 2.125-2.875 2.938v.75c0 1.563-.188 3.125-.688 4.625a15.088 15.088 0 0 1-2.063 4.438c-.875 1.438-2 2.688-3.25 3.813a15.015 15.015 0 0 1-4.625 2.563c-1.813.688-3.75 1-5.75 1-3.25 0-6.188-.875-8.875-2.625.438.063.875.125 1.375.125 2.688 0 5.063-.875 7.188-2.5-1.25 0-2.375-.375-3.375-1.125s-1.688-1.688-2.063-2.875c.438.063.813.125 1.125.125.5 0 1-.063 1.5-.25-1.313-.25-2.438-.938-3.313-1.938a5.673 5.673 0 0 1-1.313-3.688v-.063c.813.438 1.688.688 2.625.688a5.228 5.228 0 0 1-1.875-2c-.5-.875-.688-1.813-.688-2.75 0-1.063.25-2.063.75-2.938 1.438 1.75 3.188 3.188 5.25 4.25s4.313 1.688 6.688 1.813a5.579 5.579 0 0 1 1.5-5.438c1.125-1.125 2.5-1.688 4.125-1.688s3.063.625 4.188 1.813a11.48 11.48 0 0 0 3.688-1.375c-.438 1.375-1.313 2.438-2.563 3.188 1.125-.125 2.188-.438 3.313-.875z">
                                </path>
                            </svg>
                        </a>
                        <a class="inline-block text-white no-underline hover:text-white hover:text-underline text-center h-10 w-10 p-2 md:h-auto md:w-16 md:p-4"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog.show_testimony', $testimony->slug) }}"
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

        <div class=" text-center pt-10 md:pt-10 container mx-auto">
            <p class=" md:text-2xl text-green-500 font-bold">{{ $testimony->created_at->toFormattedDateString() }}</p>
            <h1 class="font-bold break-normal text-3xl md:text-5xl">{{ $testimony->name }}</h1>
            <input value="{{ $testimony->name }}" id="titulo" hidden>

        </div>

        {{-- FOTO LG --}}
        <div class="hidden md:block container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded"
            style="background-image:url('@if ($testimony->image) https://mdc.nyc3.cdn.digitaloceanspaces.com/{{$testimony->image->url}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif'); height: 75vh;">
        </div>
        {{-- FOTO SM/MD --}}
        <div class="md:hidden mx-auto container px-2 lg:px-8  mt-4 bg-cover ">
            <img class="w-full h-96"
                src="@if ($testimony->image) https://mdc.nyc3.cdn.digitaloceanspaces.com/{{$testimony->image->url}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
                alt="">

            {{-- <img class="w-full h-96"src="@if ($testimony->image)https://mdc.nyc3.cdn.digitaloceanspaces.com/{{$testimony->image->url}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt=""> --}}
        </div>
        {{-- CUERPO --}}
        <div class="container max-w-5xl mx-auto md:-mt-32 pb-8">
            <div class="mx-0 sm:mx-6">
                <div class="bg-white w-full p-8 md:pt-24 md:px-24 text-xl md:text-2xl text-gray-800 leading-normal"
                    style="font-family:Georgia,serif;">
                    <p class="text-2xl md:text-3xl mb-5">
                        🖊 {{ $testimony->autor }}
                    </p>
                    <p class="text-2xl md:text-3xl mb-5 text-justify">
                        👋 {{ $testimony->extract }}
                    </p>
                    <div class="prose md:prose-lg lg:prose-xl select-none text-justify">
                        {!! $testimony->body !!}
                    </div>
                    <blockquote class="pt-4 border-l-4 border-green-500 italic my-8 pl-8 md:pl-12">{{ $testimony->extract }}
                    </blockquote>

                </div>

                {{-- SUSCRIPCION --}}
                {{-- @livewire('blog.suscripcion') --}}

                <div class="pb-8 flex w-full items-center font-sans px-8 md:px-24">
                    <img class="w-10 h-10 rounded-full mr-4"
                        src="@if ($testimony->image) https://mdc.nyc3.cdn.digitaloceanspaces.com/{{$testimony->image->url}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
                        alt="Avatar of Author">
                    <div class="flex-1">
                        <p class="text-base font-bold md:text-xl lg:text-3xl leading-none">VER MAS TESTIMONIOS</p>
                        <p class="text-gray-600 text-xs md:text-base">Si necesitas, no dudes en contactarnos a <a
                                class="text-gray-800 hover:text-green-500 no-underline border-b-2 border-green-500"
                                href="{{ route('landding.index') }}">olivertorres1997@gmail.com.com</a></p>
                    </div>
                    <div class="justify-end">
                        <a href="{{ route('blog.testimony') }}"
                            class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">Leer
                            Mas</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- SIMILARES --}}
        <div class=" bg-gray-200 pb-8">
            <div class="container mx-auto">
                <div class="p-5 text-center pt-10 md:pt-10 container mx-auto">
                    <h1 class=" text-green-500 font-bold break-normal text-3xl md:text-5xl">Tal vez te pueda interesar</h1>
                </div>
                <x-aminblog.slide>
                    @foreach ($similares as $similar)
                        <x-aminblog.card :item="$similar">
                            {{ route('blog.show_testimony', $similar) }}
                        </x-aminblog.card>
                    @endforeach
                </x-aminblog.slide>
            </div>
        </div>
    </div>
    <br><br>

@endsection


@section('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endsection

@section('js')
    @include('components.aminblog.show')

    {{-- <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javaScript">
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('admin.blog.estadisticas.registrar') }}",
                dataType: "POST",
                data: {
                    pagina: document.getElementById("titulo").value,
                    url:window.location.href,
                },
        
            })
        })
    </script> --}}

    {{-- <script>
        var alert_del=document.querySelectorAll('.alert-del');

        alert_del.forEach((x)=>{
            x.addEventListener('click',()=> 
            x.parentElement.classList.add('hidden')
            );
        });
    </script> --}}
@endsection

@section('footer')
    @include('components.footerT')
@endsection
