@extends('adminlte::page')

@section('title', 'Lista de Noticias')

@section('content_header')
    <h1>Lista de Noticias</h1>
@stop

@section('content')
    <x-aminblog.alert />
    <div class="mb-3">
        <a class="btn btn-primary " href="{{ route('admin.blog.announce.create') }}">Crear Noticias</a>
    </div>
    <div class="pb-4">
        <div class="table-responsive ">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col" class="text-sm">Titulo del Anuncio</th>
                        <th scope="col" class="text-right">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td class="text-center">{{ $anuncio->id }}</td>
                            <td>{{ $anuncio->name }}</td>
                            <td class="text-center">
                                @if ($anuncio->status == 1)
                                    <button class="btn btn-danger">X</button>
                                @else
                                    <button class="btn btn-success"><i class="far fa-check-circle"></i></button>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item " data-turbolinks="false"
                                            href="{{ route('blog.show_announces', $anuncio) }}">Ver</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.blog.announce.edit', $anuncio) }}">Editar</a>
                                        @can('eliminarpublicaciones')
                                            <form class="destroy"
                                                action="{{ route('admin.blog.announce.destroy', $anuncio) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">Eliminar</button>
                                            </form>
                                        @endcan

                                    </div>
                                </div>
                            </td>
                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @livewire('admin.noticia') --}}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}?v={{ env('VERSION_STYLE') }}">
@endsection

@section('js')
    {{-- <script src="{{ asset('js/show_alerts.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.js') }}"></script> --}}

    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar la Noticia!",
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
    <x-scrip-table-blog />

@stop
