@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Mi Equipo</h1>
@stop

@section('content')
    <x-aminblog.alert />

    <x-equipo.agregar />
    
    <div class="pb-4 px-3">
        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col" class="text-center">Genero</th>
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
                        @if (auth()->user()->id != $user->id && auth()->user()->id  != $user->conyugue)
                            <tr>
                                <td class="text-center"> {{ $user->id }}</td>
                                <td>{{ $user->codigo }}</td>
                                <td>{{ $user->name }}</td>
                                <td class="text-center">
                                @if ($user->genero=='H' )
                                    <p class="rounded-lg text-white bg-primary">Homber</p>
                                @else
                                <p class="rounded-lg text-white bg-info">Mujer</p>

                                @endif    
                                </td>
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
                        @endif
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
