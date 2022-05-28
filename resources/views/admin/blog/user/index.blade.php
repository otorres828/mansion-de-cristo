@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
    <x-aminblog.alert />
    <div class="mb-3">
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crear" data-bs-whatever="@mdo">Crear Usuario</a>
    </div>

    {{-- REGISTRAR USUARIO --}}
    <div class="modal fade" id="crear" tabindex="-1" aria-labelledby="crear" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.blog.user.store') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nombre Completo" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo Electronico" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Clave">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirmar Clave">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div> --}}
                        <div class="alert alert-primary text-justify text-sm" role="alert">
                            La clave por temporal del usuario sera "password", al loguearse debera confirmar su correo y posteriormente cambiarla.
                          </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- ERRORES --}}
    <ul>
        @error('password')
            <li>
                <span class="text-danger">{{ $message }}</span>
            </li>
        @enderror
        @error('email')
            <li>
                <span class="text-danger">{{ $message }}</span>
            </li>
        @enderror
    </ul>

    {{-- LISTA DE USUARIOS --}}
    <div class="pb-4 px-3">
        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th class="text-center">Roles</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="w-full">
                                <select class="form-select">
                                    @isset ($user->roles) 
                                        @foreach ($user->roles as $rol)
                                            <option>{{ $rol->name }}</option>
                                        @endforeach
                                    @else
                                        <option>SIN ROL</option>
                                    @endisset
                                </select>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item cursor-pointer" data-bs-toggle="modal"
                                            data-bs-target="#editar{{ $user->id }}" data-bs-whatever="@mdo">Editar
                                            Roles</button>

                                        <form class="destroy mr-1"
                                            action="{{ route('admin.blog.user.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit">
                                                Eliminar Cuenta
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        {{-- EDITAR ROLES --}}
                        <div class="modal fade" id="editar{{ $user->id }}" tabindex="-1"
                            aria-labelledby="editar{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Editar Rol de Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="h5">Nombre:</p>
                                        <p class="form-control">{{ $user->name }}</p>
                                        <p class="h5">Email:</p>
                                        <p class="form-control">{{ $user->email }}</p>
                                        <h2 class="h5">LISTADO DE ROLES</h2>
                                        {!! Form::model($user, ['route' => ['admin.blog.user.update', $user], 'method' => 'put']) !!}
                                        @foreach ($roles as $role)
                                            <div>
                                                <label>
                                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                                    {{ $role->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="justify-center">
                                            {!! Form::submit('Asignar Roll', ['class' => 'btn btn-primary w-full text-center']) !!}
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
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "¿Que quieres eliminar el usuario?. Solo podra ser eliminado si este no ha confirmado su correo, de lo contrario debe de contactarse con olivertorres1997@gmail.com para eliminar",
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <x-scrip-table-blog />
@stop
