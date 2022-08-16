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

@section('seo_redes_sociales')
    <meta property="og:description" content="{{ $teaching->name }}" />
@endsection

@section('main')
    @include('components.bar')
    <div class="w-full sm:px-6 pb-12 antialiased bg-white">
        <div class="mx-auto max-w-8xl">
            <div class="mx-auto sm:px-6 xl:max-w-5xl xl:px-0 mt-10">
                <p class="text-center font-bold my-5 text-indigo-500">
                    September 25, 2019
                </p>
                <h1 class="text-4xl text-gray-700 font-extrabold mb-10 text-center">
                    {{ $teaching->name }}
                </h1>
                <div class="flex items-center font-medium mt-6 sm:mx-3 justify-center"><img
                        src="{{ asset('images/logo_ucab.png') }}" alt="" loading="lazy"
                        class="mr-3 w-10 h-10 rounded-full bg-slate-50 dark:bg-slate-800">
                    <div>
                        <div class="text-slate-500 dark:text-slate-200">
                            Mansion De Cristo
                        </div> <a target="_blank" href="#"
                            class="text-sky-500 hover:text-sky-600 dark:text-sky-400">
                            @mansiondecristo
                        </a>
                    </div>
                </div>
                @isset($teaching->image)
                    <img id="picture " src="{{imagenes_storage($teaching->image->url)}}" alt=""
                        class="mx-auto w-4/5 mt-10 rounded-md drop-shadow-sm">
                @else
                    <img src="https://images.unsplash.com/photo-1648737966614-55e58b5e3caf?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1472&amp;q=80"
                        class="mx-auto w-4/5 mt-10 rounded-md drop-shadow-sm">
                @endisset

                <div class="container max-w-5xl mx-auto pb-8">
                    <div class="mx-0 sm:mx-6">
                        <div class="lg:px-28 text-xl md:text-2xl text-gray-800 leading-normal">
                            <div class="prose min-w-full p-10 mx-auto text-justify">
                                <div class="mb-5 font-semibold">
                                    {!! $teaching->extract !!}
                                </div>
                                {!! $teaching->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footer />

        </div>
    </div>
@endsection

@section('js')
    @include('components.aminblog.show')

@endsection

@section('css')
@include('components.estilos_welcome')

@endsection
@section('footer')
    @include('components.footerT')
@endsection
