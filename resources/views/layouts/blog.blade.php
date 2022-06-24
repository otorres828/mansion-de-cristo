<!DOCTYPE html>
<html lang="es " class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="En Mansion de Cristo encontrarás noticias, enseñanzas y testimonios que te ayudarán en tu crecimiento espiritual">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">    
    @yield('css')
    @yield('head')
    <title>@yield('title')</title>

    <meta property="og:type" content="website" />
    <meta property="og:title" content="▷ Iglesia Mansion de Cristo" />
    <meta property="og:description" content="En nuestra pagina web podras encontrar enseñanzas y noticias relacionadas a nuestra congregacion" />
    <meta property="og:url" content="https://mansiondecristo.com" />
    <meta property="og:image" content="{{ asset('favicon.ico') }}" />
    <meta property="og:image:width" content="828" />
    <meta property="og:image:height" content="450" />
    <meta property="og:site_name" content="Mansion de Cristo" />
    {{-- @laravelPWA --}}
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
</head>
<body >
    <header>
        @include('components.aminblog.navigation')
    </header>

    @yield('header')
    @yield('main')
    @yield('footer')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('js')
    @stack('js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</body>
</html>