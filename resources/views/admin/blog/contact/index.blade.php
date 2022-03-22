@extends('adminlte::page')

@section('title', 'Lista de Mensajes')

@section('content_header')
    <h1>Lista de Mensajes</h1>
    
@stop

@section('content')
    <x-alert/>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Titulo</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Ver Mensaje</th>
                        <th colspan="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <td class="text-center">{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->title}}</td>
                        <td class="text-center">@if ($contact->status==1) NO LEIDO @else <strong>LEIDO</strong> @endif</td>
                        <td class="text-center"><a class=" btn btn-warning text-center"href="{{route('admin.blog.contact.show',$contact)}}">VER</a></td>
                        <td width="10px" class="text-center">
                            <form class="destroy"action="{{route('admin.blog.contact.destroy',$contact)}}" method="POST">
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
            text: "que quieres eliminar el mensaje!",
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