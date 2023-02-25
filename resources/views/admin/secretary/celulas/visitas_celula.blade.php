@extends('adminlte::page')

@section('title', 'Celulas Visitadas')

@section('content_header')
    <h2>Anfitrion: {{ $celula->anfitrion }}</h2>
    <h5>Ubicacion: {{ $celula->ubicacion }}</h5>
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
    <p class="h5 text-primary py-3">Usted ha hecho {{$visitas->count()}} visitas a esta celula evangelistica</p>
    @if ($visitas->count() > 0)
        
        <div class="table-responsive pb-5">
            <table class="table table-flush" id="example">
                <thead>
                    <tr>
                        <th>
                            <div class="text-center">FECHA DE VISITA</div>
                        </th>
                        <th>
                            <div class="text-left">OBSERVACIONES</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($visitas as $celula)
                        <tr>
                            <td class="text-center">
                                {{ Carbon\Carbon::parse($celula->fecha)->format('d-M') }}<br>
                                {{ Carbon\Carbon::parse($celula->fecha)->isoFormat('h:mm a') }}
                            </td>
                            <td>
                                {{ $celula->observaciones }}
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

@stop
