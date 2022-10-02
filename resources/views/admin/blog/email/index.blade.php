@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1 class="font-extralight">Administracion de correos envio de correos electronicos</h1>
@stop

@section('content')
    <div class="container py-1 font-serif">
        <p>
            En este apartado puedes seleccionar cuales modulos quieres que se envien correos
            electronicos a los usuarios en el momento que se haga una publicacion de estado ="publicado"
        </p>
    </div>

    @livewire('admin.emailsend', ['modulo1' => $modulo1, 'modulo2' => $modulo2, 'modulo3' => $modulo3])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Correos
                        @if (isset($errors) && $errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                    <br />
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('importar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="file" name="import_file" required />

                            <button class="actualizar btn btn-primary" type="submit">Importar {{ $correos->count() }}</button>

                        </form>
                    </div>

                    <div class="card-body">
                        <x-aminblog.alert />

                        <table class="table table-bordered table-striped products_table" style="width: 100%;"
                            id="example">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Correo Electronico</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($correos as $correo)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            {{ $correo->email }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Acciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#correo{{ $correo->id }}"
                                                    data-bs-whatever="@mdo">Editar</button>
                                                    <form class="destroy"
                                                        action="{{ route('importar.destroy', $correo) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item">Eliminar</button>
                                                    </form>


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- modal editar correo --}}
                                    <div class="modal fade" id="correo{{ $correo->id }}" tabindex="-1"
                                        aria-labelledby="correo{{ $correo->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Editar Correo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($correo, [
                                                        'route' => ['importar.update', $correo],
                                                        'autocomplete' => 'off',
                                                        'method' => 'put',
                                                    ]) !!}
                                                    <div class="form-group">
                                                        {!! Form::label('email', 'Nombre del nuevo correo') !!}
                                                        {!! Form::text('email', $correo->email, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nuevo correo']) !!}
                                                    </div>
                                                    <div class="d-flex justify-content-end align-items-baseline">
                                                        {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
                                                        <button type="button" class="ml-1 btn btn-danger"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- 
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop --}}

@section('js')
    <script>
        let actualizar = document.querySelector('.actualizar');
        actualizar.addEventListener('click',  (e)=> {
            e.preventDefault();
            actualizar.disabled = true;
            actualizar.innerHTML = 'Actualizando...';
            actualizar.form.submit();
        });
    </script>
    <x-scrip-table-blog />
    <script>
        $('.destroy').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estas Seguro?',
            text: "que quieres eliminar la categoria!",
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
@stop
