@extends('adminlte::page')

@section('title', 'Editar Enseñanza')

@section('content_header')
    <h1>Editar Enseñanza</h1>
    
@stop

@section('content')
    <x-aminblog.alert/>

    <div class="card">
        <div class="card-body">
            {!! Form::model($teaching,['route'=>['admin.blog.teaching.update',$teaching],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                @include('admin.partiels.teaching')
                {!! Form::submit('Actualizar Enseñanza', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop


<x-aminblog.cssjs/>
