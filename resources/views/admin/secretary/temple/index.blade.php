@extends('adminlte::page')

@section('title', 'Iglesias Hijas')

@section('content_header')
    <h1>Listado de Iglesias Hijas</h1>
@stop

@section('content')
    <x-alert/>
    <div class="mb-3">
        <a class="btn btn-primary" href="{{route('admin.secretary.temple.create')}}">Agregar Iglesia Hija</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <th scope="col">#id</th>
                        <th scope="col">Nombre</th>
                        <th >Editar</th>
                        <th >Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($temples as $temple)
                            <tr>
                                <td>{{$temple->id}}</td>
                                <td>{{$temple->name}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.secretary.temple.edit',$temple)}}"><i class="far fa-edit"></i></a>
                                </td>
                                <td width="10px">
                                    <form class="destroy"action="{{route('admin.secretary.temple.destroy',$temple->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.destroy').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estas Seguro?',
            text: "que quieres eliminar esta Iglesia! Se borrar todos los registros de sus miembros permanentemente",
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