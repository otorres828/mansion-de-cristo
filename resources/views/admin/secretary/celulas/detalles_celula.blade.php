@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
<a href="{{  url()->previous() }}" class="btn btn-sm btn-secondary">Volver</a>
<h1>Detallado de celula</h1>
@stop

@section('content')
<x-aminblog.alert />

@if ($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col font-weight-bold ">Nombre</div>
                    <div class="col font-weight-bold">Direccion</div>
                    <div class="col font-weight-bold">Fecha y hora</div>
                </div>
                <div class="row">
                    <div class="col">{{ $celula->nombre }}</div>
                    <div class="col">{{ $celula->direccion }}</div>
                    <div class="col">{{ $celula->fecha_hora}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<div class="pb-4 px-3">
    <div class="table-responsive">
        <table class="table table-flush" id="example">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($celula_miembros as $celula)
                <tr>
                    <td class="text-center">{{ $celula->id }}</td>
                    <td>{{ $celula->user->name }}</td>
                    <td>{{ $celula->rol }}</td>


                </tr>

                @endforeach

        </table>
    </div>
</div>
@stop

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
<x-scrip-table-blog />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
            $('.select2').select2();
        });
</script>
@stop
