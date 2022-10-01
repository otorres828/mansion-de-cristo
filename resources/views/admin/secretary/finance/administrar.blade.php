@extends('adminlte::page')

@section('title', 'Finanzas Personales')

@section('content_header')
    <h1>Listado de Administradores de las Finanzas de la iglesia</h1>
@stop

@section('content')
    <x-aminblog.alert />

    @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3">
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Agregar
            Administrador</a>
    </div>

    {{-- Modal agregar --}}
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar un Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route' => 'admin.secretary.finance.user.store', 'autocomplete' => 'off', 'method' => 'post']) !!}
                    @csrf
        

                    <div class="form-group">
                        {!! Form::label(null, 'Seleccione la Red') !!}
                        {!! Form::select('group_id',['1','2','3'], null, ['class' => 'form-control select2']) !!}
                        @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label(null, 'Seleccione el Administrador') !!}
                        {!! Form::select('group_id',['1','2','3'], null, ['class' => 'form-control select2']) !!}
                        @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-0">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <button type="submit" class=" ml-1 btn btn-success">Agregar</button>
                            <button type="button" class=" ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>


    <table class="table table-striped " id="example">
        <thead>
            <th>#id</th>
            <th>nombre</th>
            <th scope="col">Red</th>
            <th>Cobertura</th>
            <th scope="col" class="">Correo</th>
            <th>Aciones</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->group->name }}</td>
                    <td>
                        @if ($usuario->parent)
                            {{ $usuario->parent->name }}
                        @else
                            Master
                        @endif
                    </td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <form class="destroy" action="{{ route('administrar.finanzas.eliminar', $usuario) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editar{{ $usuario->id }}" tabindex="-1" aria-labelledby="register"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Detalles de la Finanza</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        @csrf
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <button type="button" class=" btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <x-scrip-table-blog />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar este administrador!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        });
    </script>
@stop
