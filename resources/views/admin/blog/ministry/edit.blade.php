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
                <button type="submit"  class="actualizar btn btn-primary float-right">Actualizar</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>

