@extends('adminlte::page')

@section('title', 'Finanzas Personales')

@section('content_header')
    <h1>
        Listado de Finanzas por celula</h1>
@stop

@section('content')
    <x-aminblog.alert />

    <div class="mb-3">
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Agregar
            Finanza</a>

    </div>

    {{-- Modal agregar Finanza --}}
    <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar una Finanza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.secretary.finance.user.store', 'autocomplete' => 'off', 'method' => 'post']) !!}
                            @csrf
                            {!! Form::hidden('financeable_id', auth()->user()->id) !!}
                            {!! Form::hidden('status', 1) !!}

                            {!! Form::hidden('temple_id', auth()->user()->temple_id) !!}
                            <div class="form-group">
                                {!! Form::label('amount', 'Cantidad') !!}
                                {!! Form::number('amount', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Ingrese la
                                                            cantidad',
                                ]) !!}
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('reference', 'Referencia') !!}
                                {!! Form::text('reference', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Ingrese la
                                                            referencia',
                                ]) !!}
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label(null, 'Metodo de Pago') !!}
                                <select name="method_pay" class="form-control">
                                    <option value='Transferencia'>Transferencia</option>
                                    <option value='Bs efectivo'>Bs efectivo</option>
                                    <option value='Divisas'>Divisas</option>
                                </select>
                            </div>

                            <div class="form-group">
                                {!! Form::label(null, 'Tipo de Finanza') !!}
                                <select name="type_finance" class="form-control">
                                    <option value='Diezmo'>Diezmo</option>
                                    <option value='Ofrenda'>Ofrenda</option>
                                    <option value='Pacto'>Pacto</option>
                                    <option value='Primicia'>Primicia</option>

                                </select>
                            </div>

                            <div class="form-group">
                                {!! Form::label(null, 'Fecha') !!}
                                {!! Form::date('date', null, ['class' => 'form-control']) !!}
                                <x-jet-input-error for="date"></x-jet-input-error>
                            </div>
                            <div class="form-group">
                                <p class="font-weight-bold">Estado</p>
                                <label>
                                    {!! Form::radio('status', 1, true) !!}
                                    NO VERIFICADO
                                </label>
                                @can('topost')
                                    <label>
                                        {!! Form::radio('status', 2) !!}
                                        VERIFICADO
                                    </label>
                                @endcan
                            </div>

                            <div class="mb-0">
                                <div class="d-flex justify-content-end align-items-baseline">
                                    <x-jet-button>
                                        {{ __('Registrar') }}
                                    </x-jet-button>
                                    <button type="button" class=" ml-1 btn btn-danger"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <table class="table table-striped " id="example">
        <thead>
            <th>#id</th>
            <th>Celula</th>
            <th>Cantidad</th>
            <th scope="col">Fecha</th>
            <th scope="col" class="">Estatus</th>
            <th>Aciones</th>
        </thead>
        <tbody>
            @foreach ($finances as $finance)
                <tr>
                    <td>{{ $finance->id }}</td>
                    <td>{{ $finance->financeable->nombre }}</td>
                    <td>{{ $finance->amount }}</td>
                    <td>{{ $finance->date }}</td>
                    <td class="">
                        @if ($finance->status == 1)
                            <button class="btn btn-danger">X</button>
                        @else
                            <button class="btn btn-success"><i class="far fa-check-circle"></i></button>
                        @endif
                    </td>
                    <td class="d-flex"><a class=" btn btn-warning  mr-1" data-bs-toggle="modal"
                            data-bs-target="#ver{{ $finance->id }}" data-bs-whatever="@mdo"><i class="far fa-eye"></i></a>

                        <a class="btn btn-primary mr-1" data-bs-toggle="modal" data-bs-target="#edit{{ $finance->id }}"
                            data-bs-whatever="@mdo"><i class="far fa-edit"></i></a>
                        <div class="modal fade" id="edit{{ $finance->id }}" tabindex="-1"
                            aria-labelledby="edit{{ $finance->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Agregar una Finanza</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                {!! Form::model($finance, [
                                                    'route' => ['admin.secretary.finance.user.update', $finance],
                                                    'autocomplete' => 'off',
                                                    'method' => 'put',
                                                ]) !!}
                                                @csrf
                                                {!! Form::hidden('financeable_id', auth()->user()->id) !!}
                                                {!! Form::hidden('status', 1) !!}

                                                {!! Form::hidden('temple_id', auth()->user()->temples_id) !!}
                                                <div class="form-group">
                                                    {!! Form::label('amount', 'Cantidad') !!}
                                                    {!! Form::number('amount', $finance->amount, [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Ingrese la cantidad',
                                                    ]) !!}
                                                    @error('amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('reference', 'Referencia') !!}
                                                    {!! Form::text('reference', $finance->reference, [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Ingrese la referencia',
                                                    ]) !!}
                                                    @error('amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label(null, 'Metodo de Pago') !!}
                                                    <select name="method_pay" class="form-control">
                                                        <option value='Transferencia'>Transferencia</option>
                                                        <option value='Bs efectivo'>Bs efectivo</option>
                                                        <option value='Divisas'>Divisas</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label(null, 'Tipo de Finanza') !!}
                                                    <select name="type_finance" class="form-control">
                                                        <option value='Diezmo'>Diezmo</option>
                                                        <option value='Ofrenda'>Ofrenda</option>
                                                        <option value='Pacto'>Pacto</option>
                                                        <option value='Primicia'>Primicia</option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label(null, 'Fecha') !!}
                                                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                                                    <x-jet-input-error for="date"></x-jet-input-error>
                                                </div>
                                                <div class="form-group">
                                                    <p class="font-weight-bold">Estado</p>
                                                    <label>
                                                        {!! Form::radio('status', 1, true) !!}
                                                        NO VERIFICADO
                                                    </label>
                                                    @can('topost')
                                                        <label>
                                                            {!! Form::radio('status', 2) !!}
                                                            VERIFICADO
                                                        </label>
                                                    @endcan
                                                </div>

                                                <div class="mb-0">
                                                    <div class="d-flex justify-content-end align-items-baseline">
                                                        <x-jet-button>
                                                            {{ __('Registrar') }}
                                                        </x-jet-button>
                                                        <button type="button" class=" ml-1 btn btn-danger"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>

                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="destroy" action="{{ route('admin.secretary.finance.user.destroy', $finance) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="ver{{ $finance->id }}" tabindex="-1" aria-labelledby="register"
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
                                            <label class="">Celula:
                                                {{ $finance->financeable->nombre }}</label><br>
                                            <label class="">Cantidad: {{ $finance->amount }}</label><br>
                                            <label class="">Referencia: {{ $finance->reference }}</label><br>
                                            <label class="">Tipo de Finanza:
                                                {{ $finance->type_finance }}</label><br>
                                            <label class="">Metodo de Pago: {{ $finance->method_pay }}</label><br>
                                            <label class="">Fecha: {{ $finance->date }}</label>
                                        </div>
                                    </div>
                                    <button type="button" class=" btn btn-danger"
                                        data-bs-dismiss="modal">Cerrar</button>
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
                text: "que quieres eliminar esta jerarquia!",
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
@stop
