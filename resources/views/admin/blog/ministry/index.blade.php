@extends('adminlte::page')

@section('title', 'Lista de Ministerios')

@section('content_header')
    <h1>Lista de Ministerios</h1>
    
@stop

@section('content')
    <x-aminblog.alert/>
    <div class="mb-3">
        <a class="btn btn-primary " href="{{route('admin.blog.ministry.create')}}">Crear Ministerio</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Nombre del Ministerio o Departamento</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Ver Ministerio</th>
                        <th colspan="col">Editar</th>
                        <th colspan="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ministries as $ministry)
                    <tr>
                        <td class="text-center">{{$ministry->id}}</td>
                        <td>{{$ministry->name}}</td>
                        <td class="text-center">@if ($ministry->status==1) BORRADOR @else <strong>PUBLICADO</strong> @endif</td>
                        <td class="text-center"><a class=" btn btn-warning text-center"href="{{route('blog.show_ministery',$ministry->slug)}}">VER</a></td>
                        <td width="10px" class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.blog.ministry.edit',$ministry)}}"><i class="far fa-edit"></i></a>
                        </td>
                        <td width="10px" class="text-center">
                            <form class="destroy"action="{{route('admin.blog.ministry.destroy',$ministry)}}" method="POST">
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
            text: "que quieres eliminar el ministerio!",
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop