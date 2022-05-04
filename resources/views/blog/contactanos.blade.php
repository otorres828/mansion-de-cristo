@extends('layouts.blog')
@section('title', 'MDC-Contactanos')

@section('header')
    @include('components.aminblog.header')
@endsection

@section('main')
    <div class="mr-3 ml-3 mb-10  -mt-64 xl:mx-32 relative rounded-lg">
        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <article class="bg-gray-50 overflow-hidden shadow-xl sm:rounded-lg px-6 py-10">
                    <div class="px-6 py-4">
                        {{-- ALERTA --}}
                        @if (session('info'))
                            <div class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200 " role="alert">
                                <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                                    En hora buena, Tu mensaje ha sido enviado, pronto nos comicaremos contigo!
                                </div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                                    data-dismiss-target="#alert-3" aria-label="Close">
                                    <span class="sr-only">Cerrar</span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        @endif
                        {{-- FIN ALERTA --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="col-span-1 mx-auto">
                                <div class="mb-10">
                                    <h2 class="text-4xl font-bold leading-tight lg:text-5xl mb-2">¡Escríbenos!</h2>
                                    <div class="text-gray-600">Dejanos un mensaje y te responderemos a la brevedad</div>
                                </div>
                                <img src="{{ asset('images/contact.svg') }}" alt="" class="p-6 w-50 h-50 skew-y-12">
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
                                                Este es un formulario de contácto, donde podremos aclarar dudas especificas
                                                y de gran relevancia.
                                                Tambien puedes visitarnos en nuestras redes sociales y conocer un poco mas
                                                de nuestra congregacion
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::open(['route' => 'blog.contact.store', 'class' => 'space-y-6 ng-untouched ng-pristine ng-valid', 'autocomplete' => 'off']) !!}

                                <div>
                                    <label for="name" class="text-sm">Nombre completo</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                                        name="name" type="text" placeholder="Nombre completo" required>
                                </div>
                                <div>
                                    <label for="email" class="text-sm">Email</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                                        type="email" placeholder="Escriba aquí su correo electrónico" id="email"
                                        name="email" required>
                                </div>
                                <div>
                                    <label for="name" class="text-sm">Asunto</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                                        name="title" type="text" placeholder="Asunto" required>
                                </div>
                                <div>
                                    <label for="message" class="text-sm">Mensaje</label>
                                    <div class="w-full">
                                        <textarea name="description" class="
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
                                            rows="3" placeholder="Escribe tu mensaje" required></textarea>
                                    </div>
                                </div>
                                <div>
                                    <button
                                        class="w-full p-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Enviar mensaje
                                    </button>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </main>
    </div>
@endsection

@section('js')
    <script>
        var alert_del = document.querySelectorAll('.alert-del');

        alert_del.forEach((x) => {
            x.addEventListener('click', () =>
                x.parentElement.classList.add('hidden')
            );
        });
    </script>
@endsection

@section('footer')
    @include('components.footerT')
@endsection
