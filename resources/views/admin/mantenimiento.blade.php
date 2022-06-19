@extends('adminlte::page')

@section('title', 'Configuracion de Mantenimiento')

@section('content_header')
    <h1 class="font-extralight">Administracion de la pagina web, habilitar o deshabilitar la vista al publico</h1>
@stop

@section('content')
    <div class="container py-1 font-serif">
        <p>
            En este apartado puedes quitar de servicio la pagina web (blog)
        </p>
    </div>
    {{-- LLAMADA A LA REACTIVIDAD MANTENIMIENTO --}}
    @livewire('admin.mantenimiento', ['modulo1'=>$modulo1,'modulo2'=>$modulo2,'modulo3'=>$modulo3,'modulo4'=>$modulo4,'modulo5'=>$modulo5,'modulo6'=>$modulo6,'modulo7'=>$modulo7,'modulo8'=>$modulo8,'modulo9'=>$modulo8])

@stop


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@stop
