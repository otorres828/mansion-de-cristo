@extends('adminlte::page')

@section('title', 'Crear Enseñanza')

@section('content_header')
    <h1>Crear una Enseñanza</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.blog.teaching.store', 'autocomplete' => 'off', 'files' => true]) !!}
                @include('admin.partiels.teaching')          
                <button type="submit"  class="actualizar btn btn-primary float-right">Publicar Enseñanza</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs />
