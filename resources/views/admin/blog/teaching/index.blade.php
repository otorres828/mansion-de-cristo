@extends('adminlte::page')

@section('title', 'Lista de Enseñanzas')

@section('content_header')
    <h1>Lista de Enseñanzas</h1>

@stop

@section('content')
    <x-aminblog.alert />
    <div>
        <a class="btn btn-primary " href="{{ route('admin.blog.teaching.create') }}">Crear Enseñanza</a>
    </div>
    <div class="pb-4 px-3">
        <div class="table-responsive py-4">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Titulo de la Enseñanza</th>
                        <th scope="col">Autor</th>
                        <th scope="col" >Categoria</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th colspan="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachings as $teaching)
                        <tr>
                            <td class="text-center">{{ $teaching->id }}</td>
                            <td>{{ $teaching->name }}</td>
                            <td>{{ $teaching->user->name }}</td>
                            <td>
                                @if ($teaching->category)
                                    {{ $teaching->category->name }}
                                @else
                                    SIN CATEGORIA
                                @endif
                            </td>

                            <td class="text-center">
                                @if ($teaching->status == 1)
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
                                        <a class="dropdown-item " data-turbolinks="false"
                                            href="{{ route('blog.show_teaching', [$teaching->slug, $teaching->id]) }}">Ver</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.blog.teaching.edit', $teaching) }}">Editar</a>
                                        @can('eliminarpublicaciones')
                                            <form class="destroy" action="{{ route('admin.blog.teaching.destroy', $teaching) }}"
                                                method="POST">
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

@section('js')
    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar la enseñanza!",
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
