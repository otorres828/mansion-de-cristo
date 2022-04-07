@extends('layouts.blog')

@section('title', 'Mansion de Cristo')

@section('main')
    <div>
        <div class="mx-auto container">
            <div class="sm:px-16 pt-8">
                <div id="indicators-carousel" class="relative" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="overflow-hidden relative h-48 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                        <!-- Item 1 -->
                        <div class=" duration-700 ease-in-out" data-carousel-item="active">
                            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class=" duration-700 ease-in-out" data-carousel-item>
                            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(22).jpg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class=" duration-700 ease-in-out" data-carousel-item>
                            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).jpg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class=" duration-700 ease-in-out" data-carousel-item>
                            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class=" duration-700 ease-in-out" data-carousel-item>
                            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                            <span class="hidden">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            <span class="hidden">Next</span>
                        </span>
                    </button>
                </div>
            </div>
            {{-- NOTICIAS --}}
            <div class="max-w-3xl mx-auto text-center mt-8">
                <h2 class="h1 text-3xl border-l-black mb-4">Puedes Leer las Noticias <a class="text-cyan-900 font-bold"
                        href="{{ route('blog.testimony') }}">Mas Recientes</a></h2>

            </div>
            <div class="pt-8 sm:px-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

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
                                <p class="text-gray-700 text-base ">
                                    {{ Illuminate\Support\Str::limit($anuncio->extract, 120, '...') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- TESTIMONIOS --}}
            <section class="relative">
                <div class="absolute inset-0 top-1/2 md:mt-24 lg:mt-0 bg-gray-800 pointer-events-none" aria-hidden="true">
                </div>
                <div class="absolute left-0 right-0 bottom-0 m-auto w-px p-px h-20 bg-gray-200 transform translate-y-1/2">
                </div>
                <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
                    <div class="py-12 md:py-20">
                        <div class="max-w-3xl mx-auto text-center pb-12 md:pb-20">
                            <h2 class="h1 text-3xl border-l-black mb-4">Puedes Leer los Testimonios <a
                                    class="text-cyan-900 font-bold" href="{{ route('blog.testimony') }}">Mas Recientes</a>
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

            <section class="mt-10">
                <div class="max-w-6xl mx-auto px-4 sm:px-6">
                    <div class="pb-12 md:pb-20">
                        <div class="relative bg-gray-900 rounded py-10 px-8 md:py-16 md:px-12 shadow-2xl overflow-hidden aos-init aos-animate"
                            data-aos="zoom-y-out">
                            <div class="absolute right-0 bottom-0 pointer-events-none hidden lg:block" aria-hidden="true">
                                <svg width="428" height="328" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <radialGradient cx="35.542%" cy="34.553%" fx="35.542%" fy="34.553%" r="96.031%"
                                            id="ni-a">
                                            <stop stop-color="#DFDFDF" offset="0%"></stop>
                                            <stop stop-color="#4C4C4C" offset="44.317%"></stop>
                                            <stop stop-color="#333" offset="100%"></stop>
                                        </radialGradient>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <g fill="#FFF">
                                            <ellipse fill-opacity=".04" cx="185" cy="15.576" rx="16" ry="15.576"></ellipse>
                                            <ellipse fill-opacity=".24" cx="100" cy="68.402" rx="24" ry="23.364"></ellipse>
                                            <ellipse fill-opacity=".12" cx="29" cy="251.231" rx="29" ry="28.231"></ellipse>
                                            <ellipse fill-opacity=".64" cx="29" cy="251.231" rx="8" ry="7.788"></ellipse>
                                            <ellipse fill-opacity=".12" cx="342" cy="31.303" rx="8" ry="7.788"></ellipse>
                                            <ellipse fill-opacity=".48" cx="62" cy="126.811" rx="2" ry="1.947"></ellipse>
                                            <ellipse fill-opacity=".12" cx="78" cy="7.072" rx="2" ry="1.947"></ellipse>
                                            <ellipse fill-opacity=".64" cx="185" cy="15.576" rx="6" ry="5.841"></ellipse>
                                        </g>
                                        <circle fill="url(#ni-a)" cx="276" cy="237" r="200"></circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="relative flex flex-col lg:flex-row justify-between items-center">
                                <div class="text-center lg:text-left lg:max-w-xl">
                                    <h3 class="h3 text-white mb-2">Powering your business</h3>
                                    <p class="text-gray-300 text-lg mb-6">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit nemo expedita voluptas culpa sapiente.</p>
                                    <form class="w-full lg:w-auto">
                                        <div
                                            class="flex flex-col sm:flex-row justify-center max-w-xs mx-auto sm:max-w-md lg:mx-0">
                                            <input type="email"
                                                class="form-input w-full appearance-none bg-gray-800 border border-gray-700 focus:border-gray-600 rounded-sm px-4 py-3 mb-2 sm:mb-0 sm:mr-2 text-white placeholder-gray-500"
                                                placeholder="Your email…" aria-label="Your email…"><a
                                                class="btn text-white bg-blue-600 hover:bg-blue-700 shadow"
                                                href="#0">Subscribe</a>
                                        </div>
                                        <p class="text-sm text-gray-400 mt-3">7 days free trial. No credit card required.
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection

@section('footer')
    @include('components.footerT')
@endsection
