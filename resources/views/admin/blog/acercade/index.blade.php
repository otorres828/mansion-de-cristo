@extends('adminlte::page')

@section('title', 'Lista de Acerca de')

@section('content_header')
    <h1>
        Lista de Informacion</h1>
@stop

@section('content')
    <x-aminblog.alert />
    <div class="mb-3">
        <a class="btn btn-primary " href="{{ route('admin.blog.acercade.create') }}">Crear Informacion</a>
    </div>
    <div class="pb-4 px-3">
        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col" class="text-sm">Titulo de la Informacion</th>
                        <th scope="col" class="text-right">Estado</th>
                        <th scope="col" class="">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($acercades as $acercade)
                        <tr>
                            <td class="text-center">{{ $acercade->id }}</td>
                            <td>{{ $acercade->name }}</td>
                            <td class="text-end">
                                @if ($acercade->status == 1)
                                    <button class="btn btn-danger">X</button>
                                @else
                                    <button class="btn btn-success"><i class="far fa-check-circle"></i></button>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.blog.acercade.edit', $acercade) }}">Editar</a>
                                        @can('eliminarpublicaciones')
                                            <form class="destroy"
                                                action="{{ route('admin.blog.acercade.destroy', $acercade) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">Eliminar</button>
                                            </form>
                                        @endcan

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar la informacion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    // 'Eliminado!',
                    // 'La red se ha eliminado con exito',
                    // 'success'
                    // )
                    this.submit();
                }
            })
        });
    </script>
    <x-scrip-table-blog />
@stop
