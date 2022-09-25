@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
<h1>Lista de celulas de mi equipo</h1>
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

                {!! Form::open(['route' => 'celulas.store', 'autocomplete' => 'off', 'method' => 'post']) !!}
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
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($celulas_equipo as $celula)
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
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#edit-{{ $celula->id }}">Editar
                                </a>
                                {{-- <a class="dropdown-item" href="{{ route('user.team', $celula) }}">Ver Equipo</a>
                                --}}
                                <form class="destroy" action="{{ route('celulas.destroy', $celula) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item">Eliminar</button>
                                </form>

                            </div>
                        </div>
                    </td>
                </tr>
                {{-- Modal editar --}}

                <div class="modal fade" id="edit-{{ $celula->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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

@section('js')
<x-scrip-table-blog />
@stop
