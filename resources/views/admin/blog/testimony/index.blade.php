@extends('adminlte::page')

@section('title', 'Lista de Testimonios')

@section('content_header')
    <h1>Lista de Testimonios</h1>
@stop

@section('content')
    <x-aminblog.alert/>
    <div class="mb-3">
        <a class="btn btn-primary " href="{{route('admin.blog.testimony.create')}}">Crear Testimonio</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Nombre del Testiominio</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Ver Testimonio</th>
                        <th colspan="col">Editar</th>
                        <th colspan="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonies as $testimony)
                    <tr>
                        <td class="text-center">{{$testimony->id}}</td>
                        <td>{{$testimony->autor}}</td>
                        <td>{{$testimony->name}}</td>
                        <td class="text-center">@if ($testimony->status==1) BORRADOR @else <strong>PUBLICADO</strong> @endif</td>
                        <td class="text-center"><a class=" btn btn-warning text-center"href="{{route('blog.show_testimony',$testimony->slug)}}">VER</a></td>
                        <td width="10px" class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.blog.testimony.edit',$testimony)}}"><i class="far fa-edit"></i></a>
                        </td>
                        <td width="10px" class="text-center">
                            <form class="destroy"action="{{route('admin.blog.testimony.destroy',$testimony)}}" method="POST">
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
    <x-scrip-table-blog/>

@stop