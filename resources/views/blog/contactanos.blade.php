@extends('layouts.blog')
@section('title','MDC-Contactanos')

@section('header')
    <header data-parallax="true" class="bg-cover bg-center flex items-center relative h-64 py-48 dark-filter" style="background-image: url(&quot;https://aprendible.nyc3.digitaloceanspaces.com/static/persona-programando-480w.jpg&quot;); transform: translate3d(0px, 0px, 0px);"></header>
@endsection

@section('main')
<div  class="mr-3 ml-3
            z-10
            mb-10
            -mt-64
            xl:mx-32
            relative
            rounded-lg
            bg-gray-100
            shadow">
    <div class="pt-5 shadow-lg grid grid-cols-12 gap-10 container mx-auto">
        <div class="col-span-12 text-center  pt-3 gap-2">
            <h1 class=" font-bold text-2xl md:text-2xl lg:text-3xl font-heading text-gray-700">
                Complete el formulario y nos pondremos en contácto lo más pronto posible
            </h1>
        </div>
          
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-7">
            <div class="bg-white">
                <form class=" p-10 rounded-lg shadow-lg">
                    <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Formulario</h1>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Nombre</label>                            <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="username" id="username" placeholder="username" />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Correo</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="email" id="email" placeholder="@email" />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Asunto</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"  id="password" placeholder="Asunto" />
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Descripcion</label>
                        <textarea class="caret-pink-500  w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"  placeholder="Descripcion"></textarea>
                    </div>
                    <button type="submit" class="w-full mt-6 mb-3 bg-indigo-100 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans">Enviar</button>
                </form>
            </div>
        </div>       
       
        <div class="sm:col-span-12 md:col-span-6 lg:col-span-5 mx-auto">
            <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg ">
                <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="{{asset('images/icons/icon-96x96.png')}}">
                </div>
                <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">Contáctanos</h2>
                    <p class="mt-2 text-gray-600">Si deseas, también puedes escribirnos a nuestro correo electrónico</p>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="#" class="text-xl font-medium text-indigo-500">olivertorres1997@gmail.com</a>
                </div>
            </div>             
        </div>    
    </div>    
</div>
@endsection

@section('footer')
    @include('components.footerT')
@endsection


