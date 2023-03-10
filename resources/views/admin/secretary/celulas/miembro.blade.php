@extends('adminlte::page')

@section('title', 'Detalles de Celula')

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
                        <th scope="col">Dia</th>
                        <th scope="col">Lider</th>
                        <th scope="col">Anfitrion</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($celulas_miembro as $celula)
                        <tr>
                            <td class="text-center">{{ $celula->id }}</td>
                            <td>{{ $celula->dia }}</td>
                            <td>{{ $celula->user->name }}</td>
                            <td class="text-center">{{ $celula->anfitrion }}</td>
                            <td>{{ $celula->ubicacion }}</td>
                            <td>{{ $celula->telefono }}</td>
                        </tr>
                    @endforeach

            </table>
        </div>
    </div>
@stop

@section('js')
    <x-scrip-table-blog />
@stop
