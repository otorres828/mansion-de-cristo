@extends('adminlte::page')

@section('title', 'Lista de Mensajes')

@section('content_header')
    <h1>Lista de Mensajes</h1>
@stop

@section('content')
    <x-aminblog.alert/>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@stop

@section('js')
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop