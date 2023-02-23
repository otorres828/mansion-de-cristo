@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Celulas de: {{ $user->name }} </h1>
    <h1>Red: {{ $user->red->name }} </h1>

@stop

@section('content')
    <x-aminblog.alert />

    <div class="pb-4 px-3">
        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Fecha-hora</th>
                        <th scope="col">Dueño</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($celulas_miembro as $celula)
                        <tr>
                            <td class="text-center">{{ $celula->id }}</td>
                            <td>{{ $celula->nombre }}</td>
                            <td>{{ $celula->direccion }}</td>
                            <td>{{ $celula->fecha_hora }}</td>
                            <td>{{ $celula->user->name }}</td>
                        </tr>
                    @endforeach

            </table>
        </div>
    </div>
@stop

@section('js')
    <x-scrip-table-blog />
@stop
