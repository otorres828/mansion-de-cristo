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
                    <th scope="col">Acciones</th>
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
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Editar
                                    Registro</a>
                                {{-- <a class="dropdown-item" href="{{ route('user.team', $celula) }}">Ver Equipo</a>
                                --}}
                                <a class="dropdown-item" href="#">Ver Detalles</a>

                            </div>
                        </div>
                    </td>
                </tr>
                {{-- Modal editar --}}

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Editar </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('celulas.update', $celula) }}" method="post"
                                            autocomplete="off">
                                            @csrf
                                            @method('put')
                                            @include('admin.partiels.cell')

                                            <div class="d-flex justify-content-end align-items-baseline">
                                                {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                                                <button type="button" class="ml-1 btn btn-danger "
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
