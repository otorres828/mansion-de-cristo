@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Crecimiento de: {{$user->name}}</h1>
@stop

@section('content')
<div class="pb-4 px-3">
    @php
        $posicion = 0;
    @endphp
    <div class="table-responsive">
        <table class="table table-flush" id="example">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crecimientos as $crecimiento)
                    <tr>
                        <td class="text-center">{{ $posicion = $posicion + 1 }}</td>
                        <td>{{ $crecimiento->name }}</td>
                        <td class="text-center">
                            @if ($crecimiento->completadouser($user->id))
                                <button class="btn btn-success" title="Completado">
                                    <i class="fas fa-check-circle"></i></button>
                            @else
                                <button class="btn btn-danger" title="No Completado">
                                    <i class="fa fa-times-circle"></i></button>
                            @endif
                        </td>
                       
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@stop

