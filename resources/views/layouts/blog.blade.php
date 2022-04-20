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

    <div data-parallax="true" class=" bg-cover bg-center flex items-center relative h-64 py-48 dark-filter opacity-90" style="background-image: url(&quot;https://scontent-mia3-1.xx.fbcdn.net/v/t39.30808-6/260441721_6496051857133185_6705141970517452324_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=0debeb&_nc_ohc=Y7e0DsYnCLEAX9EObDd&_nc_ht=scontent-mia3-1.xx&oh=00_AT9Zghg5tjqPUh4hTej2JI8v6pJcOFEyZB3eInUm1rCyVw&oe=62650A90&quot;); transform: translate3d(0px, 0px, 0px);"></div>
    
    @yield('main')
    @yield('footer')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
     
</body>
</html>