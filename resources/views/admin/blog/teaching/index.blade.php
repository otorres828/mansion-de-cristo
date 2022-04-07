@extends('adminlte::page')

@section('title', 'Lista de Enseñanzas')

@section('content_header')
    <h1>Lista de Enseñanzas</h1>

@stop

@section('content')
    <x-aminblog.alert/>
    <div class="mb-3">
            <a class="btn btn-primary " href="{{ route('admin.blog.teaching.create') }}">Crear Enseñanza</a>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#id</th>
                            <th scope="col">Titulo de la Enseñanza</th>
                            <th scope="col" class="text-center">Autor</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th colspan="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachings as $teaching)
                            <tr>
                                <td class="text-center">{{ $teaching->id }}</td>
                                <td>{{ $teaching->name }}</td>
                                <td >{{ $teaching->user->name }}</td>
                            
                                <td class="text-center">
                                    @if ($teaching->status == 1)
                                    <button class="btn btn-danger">X</button> @else <button class="btn btn-success"><i
                                                class="far fa-check-circle"></i></button>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a class=" btn btn-secondary text-center mr-1" data-turbolinks="false"
                                        href="{{ route('blog.show_teaching', $teaching->slug) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary mr-1" href="{{ route('admin.blog.teaching.edit', $teaching) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form class="destroy mr-1" action="{{ route('admin.blog.teaching.destroy', $teaching) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('js')
    <script>
        $('.destroy').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estas Seguro?',
            text: "que quieres eliminar la enseñanza!",
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
    <x-scrip-table-blog/>

@stop