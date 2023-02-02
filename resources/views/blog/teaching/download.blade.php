<!DOCTYPE html>
<html lang="es " class="scroll-smooth">

<head>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <style>
        .justificar{
            text-align: justify;
            text-justify: inter-word;  
        }
        .centrar{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="bg-white font-sans leading-normal tracking-normal">
        <div class="w-full sm:px-6 antialiased bg-white">
            <div class="mx-auto max-w-8xl">
                <div class="mx-auto sm:px-6 xl:max-w-5xl xl:px-0 mt-10">
                    <p class="text-center font-bold my-5 text-indigo-500">
                        {{ $teaching->created_at->toFormattedDateString() }}
                    </p>
                    <h1 class="mx-4 sm:mx-0 text-4xl text-gray-700 font-bold mb-5 centrar">
                        {{ $teaching->name }}
                    </h1>

                    <div class="container max-w-5xl mx-auto py-8">
                        <div class="mx-6">
                            <div class="lg:px-28 text-xl md:text-2xl text-gray-800 leading-normal">
                                <div class="prose md:prose-lg lg:prose-xl justificar">
                                    <div class="mb-5 font-semibold">
                                        {!! $teaching->extract !!}
                                    </div>
                                    {!! $teaching->body !!}
                                    <blockquote class="pt-4 border-l-4 border-green-500 italic my-8 pl-8 md:pl-12">
                                        <strong>Autor:
                                        </strong>{{ $teaching->user->name }}</blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</body>

</html>
