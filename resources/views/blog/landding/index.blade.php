@extends('layouts.blog')

@section('title', 'Mansion de Cristo')

@section('main')
    <div>
        <div class="mx-auto container">
            <div class="relative">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                     <!-- Item 1 -->
                    <div id="carousel-item-1" class="hidden duration-700 ease-in-out">
                        <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First Slide</span>
                        <img src="data:image/webp;base64,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" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div id="carousel-item-2" class="hidden duration-700 ease-in-out">
                        <img src="https://www.online-image-editor.com/styles/2019/images/power_girl.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div id="carousel-item-3" class="hidden duration-700 ease-in-out">
                        <img src="/docs/images/carousel/carousel-3.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div id="carousel-item-4" class="hidden duration-700 ease-in-out">
                        <img src="/docs/images/carousel/carousel-4.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    <button id="carousel-indicator-1" type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"></button>
                    <button id="carousel-indicator-2" type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"></button>
                    <button id="carousel-indicator-3" type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"></button>
                    <button id="carousel-indicator-4" type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"></button>
                </div>
                <!-- Slider controls -->
                <button id="data-carousel-prev" type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none">
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button id="data-carousel-next" type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none">
                    <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>
            {{-- NOTICIAS --}}
            <div class="max-w-3xl mx-auto text-center mt-8">
                <h2 class="h1 text-3xl border-l-black mb-4">Puedes Leer las Noticias <a class="text-cyan-900 font-bold"
                        href="{{ route('blog.testimony') }}">Mas Recientes</a>
                </h2>
                <p class="text-xl text-gray-600">
                    Conoce las noticias de interes mas recientes acerca de nuestra congregacion, si quieres puedes ver  <a class="text-cyan-900 font-bold"
                        href="{{ route('blog.announces') }}">mas noticias aqui aqui</a>.
                </p>
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

            
        </div>

    </div>
@endsection

@section('footer')
    @include('components.footerT')
@endsection


@section('js')
    <script>
    </script>
@endsection