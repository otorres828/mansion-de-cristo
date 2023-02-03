@extends('layouts.blog')
@section('title', 'MDC-Enseñanzas')

@section('head')
    <meta name="viewport" content= "width=device-width, user-scalable=no">

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
    <div class="bg-white font-sans leading-normal tracking-normal">
        <div id="header" class="bg-white fixed w-full z-50 top-0 hidden animated">
            <div class="bg-white">
                <div class="flex flex-wrap items-center content-center">
                    <div class="flex w-1/2 justify-start text-white font-extrabold">
                        <a class="flex text-gray-900 no-underline hover:text-gray-900 hover:no-underline pl-2"
                            >
                            📰 <span class="hidden w-0 md:w-auto md:block pl-1">Mansion de Cristo - Enseñanzas</span>
                        </a>
                    </div>
                    <div class="flex w-1/2 justify-end content-center">
                        <p class="hidden sm:block mr-3 text-center h-14 p-4 text-xs"><span class="pr-2">Comparte
                                esto</span> 👉</p>
                        <a class="inline-block text-white no-underline hover:text-white hover:text-underline text-center h-10 w-10 p-2 md:h-auto md:w-16 md:p-4"
                            href="https://api.whatsapp.com/send/?text={{ route('blog.show_teaching', $teaching->slug) }}"
                            style="background-color:#25da76;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="20px" height="20px"
                                fill-rule="evenodd" clip-rule="evenodd">
                                <path fill="#fff"
                                    d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z" />
                                <path fill="#fff"
                                    d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z" />
                                <path fill="#cfd8dc"
                                    d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z" />
                                <path fill="#40c351"
                                    d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z" />
                                <path fill="#fff" fill-rule="evenodd"
                                    d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
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

        <div class="w-full sm:px-6 antialiased bg-white">
            <div class="mx-auto max-w-8xl">
                <div class="mx-auto sm:px-6 xl:max-w-5xl xl:px-0 mt-10">
                    <p class="text-center font-bold my-5 text-indigo-500">
                        {{ $teaching->created_at->toFormattedDateString() }}
                    </p>
                    <h1 class="mx-4 sm:mx-0 text-4xl text-gray-700 font-bold mb-5 text-center">
                        {{ $teaching->name }}
                    </h1>
                    <div class="flex items-center font-medium sm:mx-4 justify-center"><img
                            src="{{ asset('images/icons/icon-152x152.png') }}" alt="" loading="lazy"
                            class="mr-3 w-10 h-10 rounded-full bg-slate-50 dark:bg-slate-800">
                        <div>
                            <div class="text-slate-500 dark:text-slate-200">
                                Mansion De Cristo
                            </div> <a target="_blank" href="https://www.instagram.com/mansiondecristo/"
                                class="text-sky-500 hover:text-sky-600 dark:text-sky-400">
                                @mansiondecristo
                            </a>
                        </div>
                    </div>
                    @isset($teaching->image)
                        <img id="picture " src="{{imagenes_storage($teaching->image->url)}}" alt=""
                            class="mx-auto w-4/5 mt-6 rounded-md drop-shadow-sm">
                    @else
                        <img src="https://images.unsplash.com/photo-1648737966614-55e58b5e3caf?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1472&amp;q=80"
                            class="mx-auto w-4/5 mt-6 rounded-md drop-shadow-sm">
                    @endisset
    
                    <div class="container max-w-5xl mx-auto py-8">
                        <div class="mx-6">
                            <div class="lg:px-28 text-xl md:text-2xl text-gray-800 leading-normal">
                                <div class="prose md:prose-lg lg:prose-xl text-justify">
                                    <div class="mb-5 font-semibold">
                                        {!! $teaching->extract !!}
                                    </div>
                                    {!! $teaching->body !!}
                                    <blockquote class="pt-4 border-l-4 border-green-500 italic my-8 pl-8 md:pl-12"><strong>Autor:
                                    </strong>{{ $teaching->user->name }}</blockquote>
                                </div>
                            </div>
                            <div class="flex space-x-2 justify-center">
                                <a  data-turbolinks="false"
                                  href="{{route('blog.download_teaching',$teaching->slug)}}"
                                  class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                                >Descargar PDF</a>
                              </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>

        {{-- SIMILARES --}}
        <div class="bg-gray-200">
            <div class=" text-center pt-5 md:pt-5 container mx-auto">
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
@endsection

@section('js')
    @include('components.aminblog.show')
@endsection

@section('footer')
    @include('components.footerT')
@endsection
