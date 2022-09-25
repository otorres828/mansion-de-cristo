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
    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Registrar
        celula</a>
</div>

<div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Registrar un nuevo celula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {!! Form::open(['route' => 'celulas.store', 'autocomplete' => 'off', 'method' =>
                'post'])
                !!}
                @include('admin.partiels.cell')

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

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<x-scrip-table-blog />
@stop
