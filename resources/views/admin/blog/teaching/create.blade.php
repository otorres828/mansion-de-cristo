@extends('adminlte::page')

@section('title', 'Crear Enseñanza')

@section('content_header')
    <h1>Crear una Enseñanza</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.blog.teaching.store','autocomplete'=>'off','files'=>true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!} 
                @include('admin.partiels.teaching')
                {!! Form::submit('Publicar Enseñanza', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
