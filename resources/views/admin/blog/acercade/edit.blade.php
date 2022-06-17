@extends('adminlte::page')

@section('title', 'Editar Informacion')

@section('content_header')
    <h1>Editar Informacion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($acercade,['route'=>['admin.blog.acercade.update',$acercade],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                @include('admin.partiels.acercade')
                {!! Form::submit('Actualizar Informacion', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
