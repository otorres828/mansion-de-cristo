<!DOCTYPE html>
<html lang="es " >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    @livewireStyles
    
    @yield('css')
    @yield('head')
    <title>@yield('title')</title>
</head>
<body class="">

    <header>
        @livewire('blog.navigation')
    </header>


    @yield('header')
    @yield('main')
    @yield('footer')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

</body>
</html>