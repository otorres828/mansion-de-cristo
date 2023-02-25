@extends('adminlte::page')

@section('title', 'Mis Celulas')

@section('content_header')
    <h1>Mis celulas</h1>
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
            Usted Tiene {{ $celulas->count() }} celulas
        </p>
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
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" style="cursor:pointer;"data-toggle="modal" data-target="#edit-{{ $celula->id }}">Editar
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
    <x-delete-celula />
    <x-scrip-table-blog />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
