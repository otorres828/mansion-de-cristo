@extends('adminlte::page')

@section('title', 'Crear Testimonio')

@section('content_header')
    <h1>Publicar un Testimonio</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.blog.testimony.store','autocomplete'=>'off','files'=>true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!}
                @include('admin.partiels.testimony')
                {!! Form::submit('Publicar Testimonio', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
