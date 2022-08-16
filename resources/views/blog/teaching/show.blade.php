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
                        src="{{ asset('images/icons/icon-152x152.png') }}" alt="" loading="lazy"
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
                            <blockquote class="pt-4 border-l-4 border-green-500 italic my-8 pl-8 md:pl-12"><strong>Autor:
                            </strong>{{ $teaching->user->name }}</blockquote>
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
                                        src="@if ($teaching->image) {{ imagenes_storage($teaching->image->url) }}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif"
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
                                    <a
                                        href="{{ route('blog.show_teaching', $teaching->slug) }}">{{ $teaching->name }}</a>
                                </h4>
                                <div wire:click="filtro({{ $teaching->category_id }})"
                                    class="mt-2 p-1 w-auto rounded text-xs   shadow-lg  uppercase font-serif text-white bg-green-800">
                                    <button type="button"
                                        class="text-1xl p-1">{{ $teaching->category->name }}</button>
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
