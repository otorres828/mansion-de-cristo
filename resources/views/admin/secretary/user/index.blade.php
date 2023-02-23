@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Miembros</h1>
@stop

@section('content')
    <x-aminblog.alert />

    <div class="mb-3">
        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Registrar
            Usuario</a>
    </div>

    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar un nuevo usuario</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
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
                            <td>{{ $user->jerarquia->name }}</td>
                            <td>{{ $user->parent->name }}</td>
                            @if (auth()->user()->hasRole('Master'))
                                <td>{{ $user->red->name }}</td>
                            @endif
                            <td>
                                @include('admin.partiels.drowdown')
                            </td>
                            @include('admin.partiels.modales_usuarios')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <x-scrip-table-blog />
@stop
