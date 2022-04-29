<div wire:target="loadTeachings">

    <div wire:loading.flex="" wire:target="loadTeachings" class="flex justify-center items-center mt-16">
        <div class="flex">
            <div class="w-4 h-4 rounded-full animate-pulse bg-blue-500"></div>
            <div class="w-4 h-4 rounded-full animate-pulse bg-blue-500 mx-2"></div>
            <div class="w-4 h-4 rounded-full animate-pulse bg-blue-500"></div>
        </div>
    </div>

    <div x-data="{ swiper: null }" x-init="swiper = new Swiper($refs.container, {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 0,
    
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 0,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 0,
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 0,
            },
        },
    })" class="relative mx-auto flex flex-row">
        <div class="absolute inset-y-0 left-0 z-10 flex items-center">
            <button @click="swiper.slidePrev()"
                class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events"
            x-ref="container">
            <ul class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-2221.33px, 0px, 0px);"
                id="swiper-wrapper-c13f79fefad39bd1" aria-live="polite">
                <li class="swiper-slide p-2 swiper-slide-duplicate" role="group" aria-label="14 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="9">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/DYHr7SNjR0gijMKGLYZW9NsqIHbEPD0DDAX9UW1O.png"
                                alt="Galería de imágenes en Laravel 7">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Galería de imágenes en Laravel 7</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/galeria-de-imagenes-en-laravel-7"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>
                <li class="swiper-slide p-2 swiper-slide-duplicate" role="group" aria-label="15 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="10">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/WCBsEI61yWdO00CVmENfVOW7cryteWsBxRJhZQY4.png"
                                alt="Crea un Ecommerce con Laravel, Livewire, Tailwind y Alpine">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Crea un Ecommerce con Laravel, Livewire, Tail...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">


                                29.99 USD



                            </p>

                            <a href="https://codersfree.com/cursos/crea-un-ecommerce-con-laravel-livewire-tailwind-y-alpine"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>
                <li class="swiper-slide p-2 swiper-slide-duplicate" role="group" aria-label="16 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="11">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/pTip8ceKVgBTuOjDBBKShy7Exd2YCK5eEa8dnHzB.jpg"
                                alt="Aprende Vue 3 desde cero + inertia">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Aprende Vue 3 desde cero + inertia</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">


                                29.99 USD



                            </p>

                            <a href="https://codersfree.com/cursos/aprende-vue-3-desde-cero-mas-inertia"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>
                <!-- Slides -->

                <li class="swiper-slide p-2" role="group" aria-label="5 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="0">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/xTghTTFJjl8JwmvIpMGH4tBh8nadjsppvHvK0Gvy.png"
                                alt="Aprende Laravel 8 desde cero">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Aprende Laravel 8 desde cero</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/aprende-laravel-8-desde-cero"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="6 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="1">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/gbjhcdTvUMsfn9cMqFGYyFUhDNlgBCZUkCRgjWVl.png"
                                alt="Curso Tailwind desde cero">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Curso Tailwind desde cero</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/curso-tailwind-desde-cero"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="7 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="2">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/RjC8BBiJkFd9aq0e9rcV2igIRAHN2DgBwfeoFxUH.jpg"
                                alt="Aprende a crear un blog autoadministrable con Laravel 8">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Aprende a crear un blog autoadministrable con...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/aprende-a-crear-un-blog-autoadministrable-con-laravel-8"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2 swiper-slide-prev" role="group" aria-label="8 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="3">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/ssU4iFjaAhnCZuOfGbKwc2pjxv5HywJrtzF1P6gX.png"
                                alt="Cómo integrar la plantilla AdminLTE 3 en tu proyecto de Laravel 7">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Cómo integrar la plantilla AdminLTE 3 en tu p...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/como-integrar-la-plantilla-adminlte-3-en-tu-proyecto-de-laravel-7"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2 swiper-slide-active" role="group" aria-label="9 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="4">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/2LomafVixmh9nvyOS8V9SKqVD9fmqu9zuv5sxgbI.png"
                                alt="Crea aplicaciones web dinámicas con Laravel Livewire">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Crea aplicaciones web dinámicas con Laravel L...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/crea-aplicaciones-web-dinamicas-con-laravel-livewire"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2 swiper-slide-next" role="group" aria-label="10 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="5">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/jllKziHya1YH9GoQy21n48NKuSi8KBrdmJwSd8XT.png"
                                alt="Relaciones avanzadas de Laravel">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Relaciones avanzadas de Laravel</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/relaciones-avanzadas-de-laravel"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="11 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="6">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/OhAFA7hNgx1Z7mpWH39bCXI2ZHwlpABJp5GRgmTL.png"
                                alt="Como subir tu proyecto Laravel a un hosting o servidor">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Como subir tu proyecto Laravel a un hosting o...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/como-subir-tu-proyecto-laravel-a-un-hosting-o-servidor"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="12 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="7">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/fRv1rcEPH7OIICLw3jxlv5HMmLnLQpgnmuShikPW.png"
                                alt="Tips Laravel">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Tips Laravel</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/tips-laravel" class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="13 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="8">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/DAR3zqUlsS5cEYP49t2rlLMTZhq8WVz6RuQv1Paw.png"
                                alt="Como hacer login por redes sociales con Laravel 7 y Socialite">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Como hacer login por redes sociales con Larav...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/como-hacer-login-por-redes-sociales-con-laravel-7-y-socialite"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="14 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="9">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/DYHr7SNjR0gijMKGLYZW9NsqIHbEPD0DDAX9UW1O.png"
                                alt="Galería de imágenes en Laravel 7">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Galería de imágenes en Laravel 7</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/galeria-de-imagenes-en-laravel-7"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="15 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="10">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/WCBsEI61yWdO00CVmENfVOW7cryteWsBxRJhZQY4.png"
                                alt="Crea un Ecommerce con Laravel, Livewire, Tailwind y Alpine">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Crea un Ecommerce con Laravel, Livewire, Tail...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">


                                29.99 USD



                            </p>

                            <a href="https://codersfree.com/cursos/crea-un-ecommerce-con-laravel-livewire-tailwind-y-alpine"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2" role="group" aria-label="16 / 20" style="width: 317.333px;"
                    data-swiper-slide-index="11">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/pTip8ceKVgBTuOjDBBKShy7Exd2YCK5eEa8dnHzB.jpg"
                                alt="Aprende Vue 3 desde cero + inertia">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Aprende Vue 3 desde cero + inertia</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">


                                29.99 USD



                            </p>

                            <a href="https://codersfree.com/cursos/aprende-vue-3-desde-cero-mas-inertia"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>


                <li class="swiper-slide p-2 swiper-slide-duplicate" role="group" aria-label="5 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="0">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/xTghTTFJjl8JwmvIpMGH4tBh8nadjsppvHvK0Gvy.png"
                                alt="Aprende Laravel 8 desde cero">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Aprende Laravel 8 desde cero</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/aprende-laravel-8-desde-cero"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>
                <li class="swiper-slide p-2 swiper-slide-duplicate" role="group" aria-label="6 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="1">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/gbjhcdTvUMsfn9cMqFGYyFUhDNlgBCZUkCRgjWVl.png"
                                alt="Curso Tailwind desde cero">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Curso Tailwind desde cero</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/curso-tailwind-desde-cero"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>
                <li class="swiper-slide p-2 swiper-slide-duplicate" role="group" aria-label="7 / 20"
                    style="width: 317.333px;" data-swiper-slide-index="2">
                    <article class="bg-white overflow-hidden sm:rounded-lg flex flex-col h-full">
                        <figure class="aspect-w-16 aspect-h-9">
                            <img class="object-cover object-center"
                                src="https://codersfree.nyc3.digitaloceanspaces.com/courses/portadas/RjC8BBiJkFd9aq0e9rcV2igIRAHN2DgBwfeoFxUH.jpg"
                                alt="Aprende a crear un blog autoadministrable con Laravel 8">
                        </figure>

                        <div class="px-6 pt-4 pb-5 flex-1 flex flex-col">
                            <h1 class="text-lg mb-1 leading-5">Aprende a crear un blog autoadministrable con...</h1>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof: Victor Arana Flores</p>

                            <ul class="flex items-center space-x-1 text-xs mb-1">

                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </li>
                            </ul>
                            <p class="font-semibold mb-2">

                                <span class="text-green-500">
                                    Gratis
                                </span>

                            </p>

                            <a href="https://codersfree.com/cursos/aprende-a-crear-un-blog-autoadministrable-con-laravel-8"
                                class="btn btn-blue text-center">
                                Más información
                            </a>
                        </div>
                    </article>
                </li>
            </ul>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>

        <div class="absolute inset-y-0 right-0 z-10 flex items-center">
            <button @click="swiper.slideNext()"
                class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none text-blue-400">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>


</div>
