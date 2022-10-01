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
                <button type="submit"  class="actualizar btn btn-primary float-right">Actualizar Informacion</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
