<nav class="bg-light" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <!-- BOTON MENU MOVIL-->
            <div x-on:click="open=true" class="absolute inset-y-0 left-0 flex items-center md:hidden">
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
                <div class="hidden md:block md:ml-6">
                    <div class="flex">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('landding.index') }}"
                            class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md text-sm font-medium"
                            aria-current="page" data-turbolinks="false">Casa</a>
                        <a href="{{ route('blog.announces') }}"
                            class="text-gray-800 hover:bg-gray-200  px-3 py-2 rounded-md text-sm font-medium">Noticias</a>
                        <a href="{{ route('blog.teaching') }}"
                            class="text-gray-800 hover:bg-gray-200  px-3 py-2 rounded-md text-sm font-medium">Enseñanzas</a>
                        <a href="{{ route('blog.ministery') }}"
                            class="text-gray-800 hover:bg-gray-200  px-3 py-2 rounded-md text-sm font-medium">Ministerios</a>
                        <a href="{{ route('blog.testimony') }}"
                            class="text-gray-800 hover:bg-gray-200  px-3 py-2 rounded-md text-sm font-medium">Testimonios</a>
                        <a href="{{ route('blog.acercade') }}"
                            class="text-gray-800 hover:bg-gray-200  px-3 py-2 rounded-md text-sm font-medium">Acerca
                            de</a>
                        <a href="{{ route('blog.contact.index') }}"
                            class="text-gray-800 hover:bg-gray-200  px-3 py-2 rounded-md text-sm font-medium">Contactanos</a>
                        @auth
                            <a class="text-blue-600 hover:bg-blue-600 hover:text-gray-50 px-3 py-2 rounded-md text-sm font-medium"
                                href="{{ route('secretary.index') }}" data-turbolinks="false">
                                Panel de Blog
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- MENU MOVIL-->
    <div class="md:hidden" x-show="open" x-on:click.away="open=false">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('landding.index') }}"
                class="text-gray-800 hover:bg-gray-200 block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page" data-turbolinks="false">Casa</a>
            <a href="{{ route('blog.announces') }}"
                class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">Noticias</a>
            <a href="{{ route('blog.teaching') }}"
                class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">Enseñanzas</a>
            <a href="{{ route('blog.ministery') }}"
                class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">Ministerios</a>
            <a href="{{ route('blog.testimony') }}"
                class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">Testimonios</a>
            <a href="{{ route('blog.acercade') }}"
                class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">Acerca de</a>
            <a href="{{ route('blog.contact.index') }}"
                class="text-gray-800 hover:bg-gray-200  block px-3 py-2 rounded-md text-base font-medium">Contactanos</a>
            @auth
                <a class="text-blue-600 hover:bg-blue-600 hover:text-gray-50 px-3 py-2 rounded-md text-sm font-medium"
                    href="{{ route('secretary.index') }}" data-turbolinks="false">
                    <strong>Panel de Blog</strong>
                </a>
            @endauth
        </div>
    </div>
</nav>
