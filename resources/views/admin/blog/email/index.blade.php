@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1 class="font-extralight">Administracion de correos envio de correos electronicos</h1>
@stop

@section('content')
    <div class="container py-1 font-serif">
        <p>
            En este apartado puedes seleccionar cuales modulos quieres que se envien correos
            electronicos a los usuarios en el momento que se haga una publicacion de estado ="publicado"
        </p>
    </div>

    @livewire('admin.emailsend', ['modulo1'=>$modulo1, 'modulo2'=>$modulo2,'modulo3'=>$modulo3])
@stop


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@stop
