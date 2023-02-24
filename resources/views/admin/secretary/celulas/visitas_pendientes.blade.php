@extends('adminlte::page')

@section('title', 'Celulas Evangelisticas')

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
    @if ($celulas->count() > 0)

        <div class="table-responsive">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th>
                            <div class="text-left">ANFITRION</div>
                        </th>
                        <th>
                            <div class="text-center">FECHA DE VISITA</div>
                        </th>

                        <th>
                            <div class=" text-center">ACCIONES</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($celulas as $celula)
                        <tr>
                            <td>
                                {{ $celula->anfitrion }}
                            </td>
                            <td class="text-center">
                                {{ Carbon\Carbon::parse($celula->fecha)->format('d-M') }}<br>
                                {{ Carbon\Carbon::parse($celula->fecha)->isoFormat('h:mm a') }}
                            </td>
                            <td class="text-center">
                                <x-celulas.evangelisticas.drowdown :celula="$celula" />
                            </td>
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
    <x-scrip-table-blog />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop