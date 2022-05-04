@extends('layouts.blog')
@section('title', 'MDC-Acerca De')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('main')
    <div
        class="mr-3 ml-3
              z-10
              mb-10
              -mt-64
              xl:mx-32
              relative
              rounded-lg
              bg-gray-100
              shadow">

        <div class="pt-5 pb-5 shadow-lg">
            <div class="max-w-6xl mx-auto  ">
                <div class="text-center pb-3 px-4 sm:px-6 lg:px-4">
                    <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-700">
                        ACERCA DE NOSOTROS
                    </h1>
                </div>
                @foreach ($acercade as $acerca)
                    <div class="py-6">
                        <h3 class="font-bold text-2xl md:text-4xl lg:text-3xl font-heading text-gray-700">
                            {{ $acerca->name }}
                        </h3>

                        @if (isset($acerca->image))
                            <div class="mx-auto container pb-5 px-2 lg:px-8  mt-8 bg-cover bg-fixed">
                                <img class="mx-auto w-full h-96" src="{{ asset('storage/' . $acerca->image->url) }}" alt="">
                            </div>
                        @endif
                        <div class="pt-5 container  w-full  mx-auto ">
                            <div class="mx-0 sm:mx-6">
                                <div class="  text-xl md:text-2xl text-gray-800 leading-normal"
                                    style="font-family:Georgia,serif;">
                                    <article class=" text-justify">
                                        {!! $acerca->body !!}
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                <p class="text-center text-gray-600 mt-2 text-3xl md:text-base">
                    Clic aquí para contactarnos
                </p>
                <div class="text-center">
                    <div class="container flex justify-center  pb-10"><a target="_blank" rel="noreferrer"
                            href="{{ route('blog.contact.index') }}"
                            class="
                      flex
                      justify-between
                      bg-messenger
                      rounded
                      text-dark
                      py-3
                      px-4
                      mx-auto
                      hover:shadow
                    "><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill-rule="evenodd"
                                clip-rule="evenodd" class="fill-current w-6 text-primary mr-2">
                                <path
                                    d="M19 24H5a5 5 0 01-5-5V5a5 5 0 015-5h14a5 5 0 015 5v14a5 5 0 01-5 5zM12 4.5c-4.418 0-8 3.316-8 7.407 0 2.332 1.163 4.411 2.981 5.769V20.5l2.724-1.495c.727.201 1.497.31 2.295.31 4.418 0 8-3.317 8-7.408S16.418 4.5 12 4.5zm.795 9.975l-2.037-2.173-3.975 2.173 4.372-4.642 2.087 2.173 3.926-2.173-4.373 4.642z">
                                </path>
                            </svg>
                            Escribenos
                        </a></div>
                </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footerT')
@endsection
