@extends('adminlte::page')

@section('title', 'Panel Blog')

@section('content_header')
    <h1>
        Hola! {{$user->name}},
    </h1>
    <h5>Es un gusto volverte a ver. Te extrañe, te recuerdo que estas en el panel del Blog.</h5>
@stop

@section('content')
   
    <div class="pb-4 px-3">
        <p>A continuacion te dire cuales son los roles que desempeñas por los momentos en esta plataforma</p>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush" >
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                            <tr>
                                <td class="text-center">{{ $rol }}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
