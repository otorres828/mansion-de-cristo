@extends('adminlte::page')

@section('title', 'Crear Noticia')

@section('content_header')
    <h1>Crear Noticia</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.blog.announce.store','autocomplete'=>'off','files'=>true]) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!} 
                @include('admin.partiels.form')
                {!! Form::submit('Crear Anuncio', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
