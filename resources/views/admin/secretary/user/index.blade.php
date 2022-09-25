@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Miembros</h1>
@stop

@section('content')
    <x-aminblog.alert />

    <div class="mb-3">
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Registrar
            Usuario</a>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar un nuevo usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route' => 'admin.secretary.user.store', 'autocomplete' => 'off', 'method' => 'post']) !!}
                    @include('admin.partiels.user')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="pb-4 px-3">
        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Jerarquia</th>
                        <th scope="col">Cobertura</th>
                        @if (auth()->user()->hasRole('Master'))
                            <th scope="col">Red</th>
                        @endif
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-center"> {{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->hierarchy->name }}</td>
                            <td>{{ $user->parent->name }}</td>
                            @if (auth()->user()->hasRole('Master'))
                                <td>{{ $user->group->name }}</td>
                            @endif
                            <td>
                                @include('admin.partiels.drowdown')
                            </td>

                            <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1"
                                aria-labelledby="edit{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Acceso</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.secretary.user.update', $user) }}"
                                                        method="post" autocomplete="off">
                                                        @csrf
                                                        @method('put')
                                                        @include('admin.partiels.team')
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- BLOQUEAR USUARIO --}}
                            <div class="modal fade" id="bloquear{{ $user->id }}" tabindex="-1"
                                aria-labelledby="bloquear{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Acceso de Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('admin.banned', ['user' => $user])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <x-scrip-table-blog />

    <script type="text/javascript">
        function eliminar_usuario(id) {
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar esta Red!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Seleccione el Usuario que sera su reemplazo',
                        html: '<select ></select>',
                        icon: 'warning',
                        showCloseButton: true,
                        showCancelButton: false,
                        showConfirmButton: false,
                        returnFocus: false,

                    })
                }
            })

        }
    </script>
@stop
