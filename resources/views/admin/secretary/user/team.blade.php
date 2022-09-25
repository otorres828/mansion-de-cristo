@extends('adminlte::page')

@section('title', 'Equipo')

@section('content_header')
    <h1>Red: {{ $us->group->name }} </h1>
@stop

@section('content')
    <x-aminblog.alert />
    <div class="text-center">
        <h1>Equipo de: {{ $us->name }}</h1>
    </div>
    <div class="pb-4 px-3">
        <div class="table-responsive">
            <table class="table table-striped " id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Jerarquia</th>
                        <th scope="col">Cobertura</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @isset($user->parent_id)
                            <tr>

                                <td class="text-center">{{ $user->id }} </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->hierarchy->name }}</td>
                                <td>{{ $user->parent->name }}</td>
                                <td>
                                    @include('admin.partiels.drowdown')
                                </td>

                                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="edit{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Editar Usuario</h5>
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
                            </tr>
                        @endisset
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <x-scrip-table-blog />
@stop
