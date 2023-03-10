@extends('adminlte::page')

@section('title', 'Mis Celulas Evangelisticas')

@section('content_header')
    <h1>Mis Celulas Evangelisticas</h1>
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
    <x-celulas.banner :ce="$ce" :cv="$cv" :pv="$pv" />
    <x-celulas.evangelisticas.agregar  />

    @if ($ce->count() > 0)
        <h1 class="ml-1 pb-2 text-lg font-semibold text-gray-600">hay
            {{ $cantidad_total - $cantidad_visitar }} celulas sin fecha para visitar</h1>
        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th>
                            <div class="text-left">ANFITRION</div>
                        </th>
                        <th>
                            <div class="text-left">UBICACION</div>
                        </th>
                        <th>
                            <div class=" text-center">TELEFONO</div>
                        </th>
                        <th>
                            <div class=" text-center">SE VISITO</div>
                        </th>
                        <th>
                            <div class="text-center">PROXIMA VISITA</div>
                        </th>
                        <th>
                            <div class=" text-center">ACCIONES</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($ce as $celula)
                        <tr>
                            <td>
                                <div>{{ $celula->anfitrion }}</div>
                            </td>
                            <td>
                                <div class="text-justify">{{ $celula->ubicacion }}</div>
                            </td>
                            <td>
                                <div class="text-center">{{ $celula->telefono }}</div>
                            </td>
                            <td class="text-center h6">
                                <a href="{{ route('celulas_evangelisticas.visitas', $celula->id) }}" class="text-center">
                                    {{ $celula->nvisitas }}
                                </a>
                            </td>
                            <td class="text-center  text-white">
                                @if ($celula->estatus)
                                    <div class="bg-success rounded-lg">
                                        {{ Carbon\Carbon::parse($celula->estatus)->format('d-M') }}<br>
                                        {{ Carbon\Carbon::parse($celula->estatus)->isoFormat('h:mm a') }}
                                    </div>
                                @else
                                    <div class="bg-danger text-white rounded-lg">
                                        NO TIENE
                                    </div>
                                @endif
                            </td>
                            <td>
                                <x-drowdown.mis_ce :celula="$celula" />
                            </td>
                            <x-celulas.evangelisticas.modales :celula="$celula" />
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @else
        <h1 class="text-gray-600 font-semibold text-xl text-center p-5">No se encontraron registros</h1>
    @endif

@stop

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
    <x-delete-celula />
    <x-scrip-table-blog />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop
