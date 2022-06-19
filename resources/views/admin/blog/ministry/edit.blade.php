@extends('adminlte::page')

@section('title', 'Editar Ministerio o Departamento')

@section('content_header')
    <h1>Editar Ministerio o Departamento</h1>
    
@stop

@section('content')
    <x-aminblog.alert/>
    <div class="card">
        <div class="card-body">
            {!! Form::model($ministry,['route'=>['admin.blog.ministry.update',$ministry],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                @include('admin.partiels.ministery')
                {!! Form::submit('Actualizar Ministerio/Departamento', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>

