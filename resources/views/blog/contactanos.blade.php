@extends('layouts.blog')
@section('title', 'MDC-Contactanos')

@section('header')
    <header data-parallax="true" class="bg-cover bg-center flex items-center relative h-64 py-48 dark-filter"
        style="background-image: url(&quot;https://aprendible.nyc3.digitaloceanspaces.com/static/persona-programando-480w.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
    </header>
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
            
            ">
        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
                <article class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-10">


                    <div class="px-6 py-4">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <div class="col-span-1">
                                <div class="mb-10">
                                    <h2 class="text-4xl font-bold leading-tight lg:text-5xl mb-2">¡Escríbenos!</h2>
                                    <div class="text-gray-600">Dejanos un mensaje y te responderemos a la brevedad</div>
                                </div>

                                <img src="https://codersfree.com/img/contact/doodle.svg" alt="" class="p-6 h-52 md:h-64">
                            </div>

                            <div class="col-span-1">

                                <div class="flex w-full overflow-hidden bg-white rounded-lg shadow-md">
                                    <div class="flex-shrink-0 flex items-center justify-center w-12 bg-blue-500">
                                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                                            </path>
                                        </svg>
                                    </div>

                                    <div class="px-4 py-2 -mx-3">
                                        <div class="mx-3">
                                            <span class="font-semibold text-blue-500">
                                                ¡Gracias por escribirnos!
                                            </span>
                                            <div class="text-sm text-gray-600">
                                                Este es un formulario de contácto, no de preguntas y respuestas. Cualquier
                                                duda sobre mis cursos dejarlo en la sección de comentarios o en el grupo
                                                Coders Free de facebook.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="https://codersfree.com/contact" method="POST" class="space-y-6 ng-untouched ng-pristine ng-valid">
                                    @csrf
                                    <div>
                                        <label for="name" class="text-sm">Nombre completo</label>
                                        <input
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                                            name="name" type="text" placeholder="Nombre completo">
                                    </div>
                                    <div>
                                        <label for="email" class="text-sm">Email</label>
                                        <input
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                                            type="email" placeholder="Escriba aquí su correo electrónico" id="email"
                                            name="email">
                                    </div>
                                    <div>
                                        <label for="name" class="text-sm">Asunto</label>
                                        <input
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                                            name="name" type="text" placeholder="Asunto">
                                    </div>
                                    <div>
                                        <label for="message" class="text-sm">Mensaje</label>
                                        <div class="w-full">
                                              <textarea
                                                class="
                                                  form-control
                                                  block
                                                  w-full
                                                  px-3
                                                  py-1.5
                                                  text-base
                                                  font-normal
                                                  text-gray-700
                                                  bg-white bg-clip-padding
                                                  border border-solid border-gray-300
                                                  rounded
                                                  transition
                                                  ease-in-out
                                                  m-0
                                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                                "
                                                id="exampleFormControlTextarea1"
                                                rows="3"
                                                placeholder="Your message"
                                              ></textarea>
                                          </div>
                                    </div>
                                    <div>
                                        <button class="w-full p-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Enviar mensaje
                                          </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                </article>
            </div>
        </main>
    </div>
@endsection

@section('footer')
    @include('components.footerT')
@endsection
