@extends('adminlte::page')

@section('title', 'Equipo')

@section('content_header')
    <h1>Red: {{ $us->red->name }} </h1>
@stop

@section('content')
    <x-aminblog.alert />
    <div class="text-center">
        <h1>Equipo de: {{ $us->name }}</h1>
    </div>
    <div class="pb-4 px-3">
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
                            <td>{{ $user->jerarquia->name }}</td>
                            <td>{{ $user->parent->name }}</td>
                            <td>
                                @include('admin.partiels.drowdown')
                            </td>

                            @include('admin.partiels.modales_usuarios')

                        </tr>
                    @endisset
                @endforeach
            </tbody>
        </table>
    </div>
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <x-scrip-table-blog />
@stop
