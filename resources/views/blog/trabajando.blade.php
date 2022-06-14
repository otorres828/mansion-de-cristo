
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mansion de Cristo</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="leading-normal tracking-normal  m-6 bg-cover bg-fixed"
        style="background-image: url('https://pagamentossmv.ga/images/header.png');">
    <div class="container mx-auto">
        <main class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full pt-6 pb-8 mb-4">
                <h1
                    class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
                    Hola!
                    <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">
                      Los departamentos de Comunicacion y Tecnologia e Innovacion estan cargando todos los datos pertinentes de nuestra iglesia antes de que puedas disfrutar de esta pagina web.
                    </span>
                   Pronto terminaremos y podras acceder a todo el contenido que tenemos preparado para ti!
                </h1>
                <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left text-indigo-200">
                    Te invitamos a mantenerte en contacto para conocer cuando este listo todo
                </p>
                <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left text-indigo-200">
                    #SomosMansionDeCristo
                </p>
            </div>
        </main>
    </div>
    @include('components.footerT')

        @livewireScripts
</body>

</html>
