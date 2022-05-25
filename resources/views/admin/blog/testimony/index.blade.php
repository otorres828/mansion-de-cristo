@extends('adminlte::page')

@section('title', 'Lista de Testimonios')

@section('content_header')
    <h1>
        Lista de Testimonios</h1>
@stop

@section('content')
    <x-aminblog.alert />
    <div class="mb-3">
        <a class="btn btn-primary " href="{{ route('admin.blog.testimony.create') }}">Crear Testimonio</a>
    </div>
    <div class="px-3">
        <div class="table-responsive">
            <table class="table " id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Autor</th>
                        <th >Nombre del Testiominio</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonies as $testimony)
                        <tr>
                            <td class="text-center">{{ $testimony->id }}</td>
                            <td>{{ $testimony->autor }}</td>
                            <td>{{ $testimony->name }}</td>

                            <td class="text-center">
                                @if ($testimony->status == 1)
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
                                        href="{{ route('blog.show_testimony', $testimony->slug) }}">Ver</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.blog.testimony.edit', $testimony) }}">Editar</a>

                                        <form class="destroy"
                                            action="{{ route('admin.blog.testimony.destroy', $testimony) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item">Eliminar</button>
                                        </form>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('js')
    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar el testimonio!",
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@stop
