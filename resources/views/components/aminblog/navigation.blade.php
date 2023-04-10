@php
    $active = request()->routeIs('blog.show_teaching') + request()->routeIs('blog.show_ministery') + request()->routeIs('blog.show_announces');
    $navlinks = [
        [
            'name' => 'Noticias',
            'route' => route('blog.announces'),
            'estatus' => $manNoticia,
            'active' => request()->routeIs('blog.announces'),
        ],
        [
            'name' => 'Enseñanzas',
            'route' => route('blog.teaching'),
            'estatus' => $manEnseñanza,
            'active' => request()->routeIs('blog.teaching'),
        ],
        [
            'name' => 'Ministerios',
            'route' => route('blog.ministery'),
            'estatus' => $manMinisterio,
            'active' => request()->routeIs('blog.ministery'),
        ],
        [
            'name' => 'Testimonios',
            'route' => route('blog.testimony'),
            'estatus' => $manTestimonio,
            'active' => request()->routeIs('blog.testimony'),
        ],
        [
            'name' => 'Acerca de',
            'route' => route('blog.acercade'),
            'estatus' => $manAcercade,
            'active' => request()->routeIs('blog.acercade'),
        ],
        [
            'name' => 'Contactanos',
            'route' => route('blog.contact'),
            'estatus' => $manContactanos,
            'active' => request()->routeIs('blog.contact'),
        ],
    ];
@endphp

<nav x-data="{ open: false }"
    class="@if (!$active) fixed min-w-full @endif bg-white border-b border-gray-100 top-0 z-[20]">

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <!-- BOTON MENU MOVIL-->
            <div x-on:click="open=true" class="absolute inset-y-0 right-0 flex items-center md:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 flex items-center justify-center md:items-stretch sm:justify-start">
                {{-- LOGOTIPO --}}
                <div class="flex-shrink-0 flex items-center">
                    <img class="block sm:hidden h-8 w-auto" src="{{ asset('images/icons/icon-96x96.png') }}"
                        alt="MDC">
                    <img class="hidden md:block h-8 w-auto" src="{{ asset('images/icons/icon-96x96.png') }}"
                        alt="MDC">
                </div>

                {{-- MENU LG --}}
                <div class="hidden md:block md:ml-6 justify-end">
                    <div class="flex space-x-8">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('landding.index') }}"
                            class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm leading-5 font-medium"
                            aria-current="page" data-turbolinks="false">Casa</a>
                        @foreach ($navlinks as $item)
                            @if ($item['estatus'] == 2)
                                <a href="{{ $item['route'] }}"
                                    class="text-gray-800 hover:bg-gray-200  px-3 py-2 rounded-md text-sm leading-5 font-medium">{{ $item['name'] }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center ">

                <div class="hidden md:flex sm:items-center sm:ml-6">
                    <div class="ml-3 relative">
                        <div class="relative" x-data="{ open: false }" @click.away="open = false"
                            @close.stop="open = false">
                            <div @click="open = ! open">
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none transition">
                                    <svg class="h-[1.6rem] w-[1.6rem]" xmlns="http://www.w3.org/2000/svg" version="1.0"
                                        viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                            class="fill-gray-600" stroke="none">
                                            <path
                                                d="M2380 5114 c-19 -2 -78 -9 -130 -14 -330 -36 -695 -160 -990 -336 -375 -224 -680 -529 -904 -904 -175 -292 -291 -632 -338 -990 -16 -123 -16 -497 0 -620 82 -623 356 -1150 820 -1581 256 -239 575 -425 922 -539 274 -91 491 -124 800 -124 228 0 329 9 530 50 689 141 1304 583 1674 1204 175 292 291 632 338 990 16 123 16 497 0 620 -47 358 -163 698 -338 990 -224 375 -529 680 -904 904 -289 173 -634 291 -980 336 -88 12 -438 21 -500 14z m385 -304 c583 -54 1146 -347 1517 -790 487 -581 652 -1337 452 -2067 -77 -281 -213 -550 -398 -785 -34 -43 -63 -78 -66 -78 -3 0 -19 43 -35 96 -85 284 -283 589 -512 790 -144 126 -341 247 -518 319 l-40 16 35 26 c63 47 216 208 253 266 142 221 202 460 177 704 -37 366 -251 681 -575 850 -674 350 -1488 -91 -1565 -850 -20 -197 18 -404 106 -579 71 -141 189 -287 305 -375 27 -20 49 -40 49 -43 0 -3 -33 -18 -73 -34 -270 -109 -540 -321 -729 -571 -109 -145 -213 -349 -264 -520 -15 -52 -31 -95 -34 -95 -8 0 -122 148 -179 233 -63 94 -174 310 -219 425 -78 198 -127 427 -144 675 -52 717 271 1445 839 1898 459 366 1041 542 1618 489z m5 -860 c257 -73 458 -274 536 -535 35 -119 37 -289 6 -406 -93 -347 -395 -579 -752 -579 -357 0 -659 232 -752 579 -31 117 -29 287 6 406 88 296 316 497 636 559 58 11 247 -3 320 -24z m-5 -1851 c310 -40 584 -178 821 -414 178 -178 290 -358 362 -585 26 -81 67 -271 59 -275 -1 -1 -31 -24 -67 -52 -308 -240 -679 -394 -1095 -454 -116 -17 -454 -17 -570 0 -416 60 -787 214 -1095 454 -36 28 -66 51 -67 52 -2 1 4 39 12 84 91 517 461 950 961 1124 221 77 431 98 679 66z">
                                            </path>
                                        </g>
                                    </svg>
                                </button>
                            </div>

                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0 "
                                style="display: none;">
                                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                    @auth
                                        <a class="text-blue-600 hover:bg-blue-600 hover:text-gray-50 px-3 block py-2 rounded-md text-base font-medium"
                                            href="{{ route('admin.blog.panel') }}" data-turbolinks="false">
                                            <strong>Panel de Control</strong>
                                        </a>
                                    @else
                                        <!-- Authentication -->
                                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                                            href="{{ route('login') }}" data-turbo="false">Iniciar sesión</a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- MENU MOVIL-->
    <div class="md:hidden justify-end" x-show="open" x-on:click.away="open=false">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('landding.index') }}"
                class="text-gray-800 hover:bg-gray-200 block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page" data-turbolinks="false">Casa</a>
            @foreach ($navlinks as $item)
                @if ($item['estatus'] == 2)
                    <a href="{{ $item['route'] }}"
                        class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">{{ $item['name'] }}</a>
                @endif
            @endforeach

            @auth
                <a class="text-blue-600 hover:bg-blue-600 hover:text-gray-50 px-3 block py-2 rounded-md text-base font-medium"
                    href="{{ route('admin.blog.panel') }}" data-turbolinks="false">
                    <strong>Panel de Blog</strong>
                </a>
            @else
                <hr>
                <a href="{{ route('login') }}"
                    class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">Iniciar
                    Sesion</a>

            @endauth
        </div>
    </div>
</nav>
