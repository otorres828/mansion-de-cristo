@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de celulas</h1>
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

    <div class="mb-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#register"> Crear
            Celula</a>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar una nueva Celula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route' => 'celulas.store', 'autocomplete' => 'off', 'method' => 'post']) !!}
                    @include('admin.partiels.cell')

                    <div class="mb-0">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <button type="submit" class="btn btn-success">Registrar</button>

                            <button type="button" class="ml-1 btn btn-danger " data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                        <th scope="col">Direccion</th>
                        <th scope="col">Fecha-hora</th>
                        <th scope="col">Dueño</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($celulas as $celula)
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
