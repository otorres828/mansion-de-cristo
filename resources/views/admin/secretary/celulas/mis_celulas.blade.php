@extends('adminlte::page')

@section('title', 'Mis Celulas')

@section('content_header')
    <p class="h5 d-flex">
    Usted Tiene {{ $celulas->count() }} celulas ⛪
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
                        <th scope="col">Anfitrion</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Dia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($celulas as $celula)
                        <tr>
                            <td>{{ $celula->anfitrion }}</td>
                            <td>{{ $celula->ubicacion }}</td>
                            <td>{{ $celula->telefono }}</td>
                            <td>{{ $celula->dia }}</td>
                            <td>
                                @include('components.drowdown.mis_celulas')
                            </td>
                        </tr>

                        <x-celulas.editar-celula-oficial :celula="$celula" :descendientes="$descendientes" />
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
    <x-delete-celula />
    <x-scrip-table-blog />
@stop
