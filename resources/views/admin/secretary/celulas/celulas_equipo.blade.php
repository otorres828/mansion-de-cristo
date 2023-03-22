@extends('adminlte::page')

@section('title', 'Celulas de Equipo')

@section('content_header')
    <h1>Lista de celulas de mi equipo ⛪</h1>
    <p class="h5">
        Su equipo tiene {{ $celulas_equipo->count() }} celulas 
    </p>
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

    <x-celulas.agregar-celula-oficial :descendientes="$descendientes" />

    <div class="pb-4 px-3">
        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Anfitrion</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Lider</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($celulas_equipo as $celula)
                        <tr>
                            <td>{{ $celula->dia }}</td>
                            <td class="text-center">{{ $celula->anfitrion }}</td>
                            <td>{{ $celula->ubicacion }}</td>
                            <td>{{ $celula->telefono }}</td>
                            <td>{{ $celula->user->name }}</td>
                            <td>
                                @include('components.drowdown.celulas_equipo')

                            </td>
                        </tr>
                        <x-celulas.editar-celula-equipo :celula="$celula" :descendientes="$descendientes" />

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
    <x-actualizar />
    <x-scrip-table-blog />
    <x-delete-celula />
@stop
