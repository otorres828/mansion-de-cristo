@extends('layouts.blog')

@section('title', 'Mansion de Cristo')

@section('main')
    <div style="height:100vh">
        <div class="container">
            <div class="mx-auto p-5">
                <div class="mb-8">
                    <div>
                        <h2 class="text-xl font-semibold sm:text-2xl mb-4">Temario del curso</h2>
                        <ul class="space-y-4" x-data="{ open: 100 }">
                            <li class="bg-white rounded-md overflow-hidden shadow-md">
                                <button class="flex items-center w-full text-left p-4 bg-gray-50 border-b"
                                    x-on:click="open == 130 ? open = null : open = 130 ">
                                    <span class="text-xl font-semibold">
                                        Introducción
                                    </span>

                                    <span class="ml-auto">
                                        4 clases
                                    </span>
                                </button>

                                <ul class="p-4" x-show="open == 130" x-transition:enter="" style="display: none;">
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Presentación del curso
                                        </span>

                                        <a href="https://codersfree.com/courses-status/aprende-a-crear-una-aplicacion-de-chat-con-laravel-y-laravel-web-socket?current_id=732"
                                            class="text-sm font-semibold text-blue-500 hover:text-blue-800">Vista previa</a>
                                    </li>
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Instalar nuevo proyecto
                                        </span>

                                        <a href="https://codersfree.com/courses-status/aprende-a-crear-una-aplicacion-de-chat-con-laravel-y-laravel-web-socket?current_id=733"
                                            class="text-sm font-semibold text-blue-500 hover:text-blue-800">Vista previa</a>
                                    </li>
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Extensiones de VSC que yo utilizo
                                        </span>

                                        <a href="https://codersfree.com/courses-status/aprende-a-crear-una-aplicacion-de-chat-con-laravel-y-laravel-web-socket?current_id=734"
                                            class="text-sm font-semibold text-blue-500 hover:text-blue-800">Vista previa</a>
                                    </li>
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Configurar proyecto para transmitir eventos
                                        </span>

                                        <a href="https://codersfree.com/courses-status/aprende-a-crear-una-aplicacion-de-chat-con-laravel-y-laravel-web-socket?current_id=735"
                                            class="text-sm font-semibold text-blue-500 hover:text-blue-800">Vista previa</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="bg-white rounded-md overflow-hidden shadow-md">
                                <button class="flex items-center w-full text-left p-4 bg-gray-50 border-b"
                                    x-on:click="open == 131 ? open = null : open = 131 ">
                                    <span class="text-xl font-semibold">
                                        Diseño de base de datos
                                    </span>

                                    <span class="ml-auto">
                                        3 clases
                                    </span>
                                </button>

                                <ul class="p-4" x-show="open == 131" x-transition:enter=""
                                    style="display: none;">
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Maquetación de base de datos
                                        </span>

                                    </li>
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Crear migraciones y modelos
                                        </span>

                                    </li>
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Crear relaciones
                                        </span>

                                    </li>
                                </ul>
                            </li>
                            <li class="bg-white rounded-md overflow-hidden shadow-md">
                                <button class="flex items-center w-full text-left p-4 bg-gray-50 border-b"
                                    x-on:click="open == 132 ? open = null : open = 132 ">
                                    <span class="text-xl font-semibold">
                                        Crear CRUD de contactos
                                    </span>

                                    <span class="ml-auto">
                                        1 clases
                                    </span>
                                </button>

                                <ul class="p-4" x-show="open == 132" x-transition:enter=""
                                    style="display: none;">
                                    <li class="flex items-center justify-between">
                                        <span>
                                            <i class="far fa-play-circle mr-2 text-blue-500"></i>
                                            Crear las rutas para contactos
                                        </span>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footerT')
@endsection
