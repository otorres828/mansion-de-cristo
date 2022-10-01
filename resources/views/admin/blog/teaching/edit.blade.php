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
                <button type="submit"  class="actualizar btn btn-primary float-right">Actualizar Enseñanza</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop


<x-aminblog.cssjs/>
