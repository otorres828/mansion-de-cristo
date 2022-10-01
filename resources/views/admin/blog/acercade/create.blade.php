@extends('adminlte::page')

@section('title', 'Crear Informacion')

@section('content_header')
    <h1>Crear Informacion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.blog.acercade.store','autocomplete'=>'off','files'=>true]) !!}
                @include('admin.partiels.acercade')
                {!! Form::submit('Crear Informacion', ['class'=>'btn btn-primary float-right actualizar']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
