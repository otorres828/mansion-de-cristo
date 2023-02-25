@extends('adminlte::page')

@section('title', 'Celulas de Equipo')

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

    <x-celulas.agregar-celula-oficial :descendientes="$descendientes" />


    <div class="pb-4 px-3">
        <p class="h5">
            Su equipo tiene {{ $celulas_equipo->count() }} celulas contando sus celulas
        </p>
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
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" style="cursor:pointer;" data-toggle="modal"
                                            data-target="#edit-{{ $celula->id }}">Editar
                                        </a>
                                        <form class="destroy" action="{{ route('celulas.destroy', $celula) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger">Eliminar</button>
                                        </form>
                                        {{-- <a class="dropdown-item" href="{{ route('celulas.show', $celula->id) }}">Ver
                                            detalles
                                        </a> --}}

                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- Modal editar --}}

                        <div class="modal fade" id="edit-{{ $celula->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Editar </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('celulas.update', $celula) }}" method="post"
                                            autocomplete="off">
                                            @csrf
                                            @method('put')
                                            @livewire('admin.edit-celula', ['celula' => $celula, 'descendientes' => $descendientes])

                                            <div class="d-flex justify-content-end align-items-baseline">
                                                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                                                <button type="button" class="ml-1 btn btn-danger "
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
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
    <x-delete-celula />
@stop
