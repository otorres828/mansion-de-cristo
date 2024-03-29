@extends('adminlte::page')

@section('title', 'Redes')

@section('content_header')
    <h1>Listado de Redes</h1>
@stop

@section('content')

    <x-aminblog.alert />
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register"
            data-bs-whatever="@mdo">Agregar Red</button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#manager"
            data-bs-whatever="@mdo">Agregar Encargado</button>
    </div>
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear nueva Red</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route' => 'admin.secretary.red.store', 'autocomplete' => 'off']) !!}
                    <div class="form-group">
                        {!! Form::hidden('temple_id', auth()->user()->temple_id) !!}
                        {!! Form::label('name', 'NOMBRE DE LA RED') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre Red']) !!}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end align-items-baseline">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manager" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Asignar Encargado de Red</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'admin.helper.loadin', 'autocomplete' => 'off', 'method' => 'post']) !!}
                    @csrf
                    @livewire('admin.encargado')

                    <div class="d-flex justify-content-end align-items-baseline">
                        {!! Form::submit('Asignar', ['class' => 'btn btn-primary mt-3']) !!}
                        <button type="button" class="ml-1 btn btn-danger mt-3" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped " id="example">
        <thead>
            <th scope="col">#id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Encargado</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($redes as $red)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('red.team', $red->id) }}" type="submit" class="text-black"
                            style="text-decoration:none">{{ $red->id }}</a>
                    </td>
                    <td>{{ $red->name }}</td>
                    <td>
                        @isset($red->encargado->user)
                            {{ $red->encargado->user->name }}
                        @else
                            <strong>NO TIENE ENCARGADO</strong>
                        @endisset
                    </td>
                    <td class="d-flex">
                        <a class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#edit{{ $red->id }}"><i
                                class="far fa-edit"></i></a>

                        <form class="destroy" action="{{ route('admin.secretary.red.destroy', $red) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>

                </tr>
                <div class="modal fade" id="edit{{ $red->id }}" tabindex="-1"
                    aria-labelledby="edit{{ $red->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Actualizar nombre de la Red</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! Form::model($red, [
                                    'route' => ['admin.secretary.red.update', $red],
                                    'autocomplete' => 'off',
                                    'method' => 'put',
                                ]) !!}
                                <div class="form-group">
                                    {!! Form::hidden('temple_id', auth()->user()->temple_id) !!}
                                    {!! Form::label('name', 'NOMBRE DE LA RED') !!}
                                    {!! Form::text('name', $red->name, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Ingrese el nombre Red',
                                    ]) !!}
                                </div>
                                <div class="d-flex justify-content-end align-items-baseline">
                                    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
@stop


@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.destroy').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar esta Red!",
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@stop
