@extends('adminlte::page')

@section('title', 'Lista de Crecimientos')

@section('content_header')
    <h1>Lista de Crecimientos</h1>
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#register"> Crear
        </button>
    </div>

    {{-- Modal agregar --}}
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar nuevo crecimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    {!! Form::open(['route' => 'crecimiento.store', 'autocomplete' => 'off', 'method' => 'post']) !!}
                    @include('admin.partiels.crecimiento')

                    <div class="mb-0">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <button type="submit" class="btn btn-success">Registrar</button>

                            <button type="button" class="ml-1 btn btn-danger " data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
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
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crecimientos as $crecimiento)
                        <tr>
                            <td class="text-center">{{ $crecimiento->id }}</td>
                            <td>{{ $crecimiento->name }}</td>
                            <td class="text-center">
                                @if ($crecimiento->status == 'inactivo')
                                    <button class="btn btn-danger" title="{{ $crecimiento->status }}">
                                        <i class="fas fa-times-circle"></i></button>
                                @else
                                    <button class="btn btn-success" title="{{ $crecimiento->status }}">
                                        <i class="fa fa-check-circle"></i></button>
                                @endif
                            </td>
                            <td class="d-flex">
                                {{-- <a class=" btn btn-warning  mr-1" data-bs-toggle="modal"
                            data-bs-target="#ver{{$crecimiento->id}}">
                            <i class="far fa-eye"></i>
                        </a> --}}

                                <button type="button" class="btn btn-warning mr-1" data-toggle="modal"
                                    data-target="#edit_{{ $crecimiento->id }}">
                                    <i class="far fa-edit"></i>
                                </button>


                                <form class="destroy" action="{{ route('crecimiento.destroy', $crecimiento) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>

                            <div class="modal fade" id="edit_{{ $crecimiento->id }}" tabindex="-1" aria-labelledby="edit"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar crecimiento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            {!! Form::model($crecimiento, [
                                                'route' => ['crecimiento.update', $crecimiento],
                                                'autocomplete' => 'off',
                                                'method' => 'put',
                                            ]) !!}
                                            <div class="form-group">
                                                {!! Form::label('name', 'Nombre del crecimiento') !!}
                                                {!! Form::text('name', $crecimiento->name ?? null, [
                                                    'class' => 'form-control ',
                                                    'placeholder' => 'Ingrese el nombre del
                                                                                        crecimiento',
                                                    'required',
                                                ]) !!}
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('status', 'Estatus') !!}
                                                {!! Form::select(
                                                    'status',
                                                    $crecimiento->status == 'inactivo'
                                                        ? ['inactivo' => 'No', 'activo' => 'Si']
                                                        : ['activo' => 'Si', 'inactivo' => 'No'],
                                                    null,
                                                    [
                                                        'class' => 'form-control
                                                                                        ',
                                                        'selected' => true,
                                                    ],
                                                ) !!}
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-0">
                                                <div class="d-flex justify-content-end align-items-baseline">
                                                    <button type="submit" class="btn btn-success">Editar</button>

                                                    <button type="button" class="ml-1 btn btn-danger "
                                                        data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
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

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
@stop
@section('js')
    <x-scrip-table-blog />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
