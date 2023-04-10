@php
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
<nav x-data="{ open: false }" class="fixed min-w-full bg-white border-b border-gray-100  top-0 z-[20]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/" data-turbo="false">
                        <img src="{{ asset('images/icons/icon-152x152.png') }}" alt="Ucab Logo" class="h-8">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 md:flex">
                    <a class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition"
                        href="{{ route('landding.index') }}">
                        Casa
                    </a>

                    @foreach ($navlinks as $item)
                        @if ($item['estatus'] == 2)
                            <a class="inline-flex rounded-md items-center px-1 pt-1 border-b-2  text-sm font-medium leading-5 text-gray-700 hover:bg-gray-200 rounded-md text-black @if ($item['active']==true) bg-gray-200 @endif"
                                href="{{ $item['route'] }}">
                                {{ $item['name'] }}
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="hidden md:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
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
                                    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                                        href="{{ route('admin.blog.panel') }}" data-turbo="false">Panel de Control</a>
                                @else
                                    <!-- Authentication -->
                                    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                                        href="{{ route('login') }}" data-turbo="false">Iniciar sesión</a>

                                    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                                        href="{{ route('register') }}" data-turbo="false">Registrarse</a>

                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                href="{{ route('landding.index') }}" data-turbolinks="false">
                Casa
            </a>
            @foreach ($navlinks as $item)
                @if ($item['estatus'] == 2)
                    <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                        href="{{ $item['route'] }}">
                        {{ $item['name'] }}
                    </a>
                @endif
            @endforeach

            @auth
                <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                    href="{{ route('admin.blog.panel') }}" data-turbolinks="false">Panel de Control</a>
            @else
                <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                    href="{{ route('login') }}" data-turbolinks="false">
                    Iniciar sesión
                </a>

                <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition"
                    href="{{ route('register') }}" data-turbolinks="false">
                    Registrarse
                </a>
            @endauth
        </div>

    </div>
</nav>
