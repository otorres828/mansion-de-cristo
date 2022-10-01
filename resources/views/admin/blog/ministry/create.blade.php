@extends('adminlte::page')

@section('title', 'Crear Ministerio')

@section('content_header')
    <h1>Publicar un Ministerio o Departamento</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.blog.ministry.store','autocomplete'=>'off','files'=>true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('admin.partiels.ministery')
                <button type="submit"  class="actualizar btn btn-primary float-right">Publicar</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
