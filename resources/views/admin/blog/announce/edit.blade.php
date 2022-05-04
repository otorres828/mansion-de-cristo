@extends('adminlte::page')

@section('title', 'Editar Noticia')

@section('content_header')
    <h1>Editar Noticia</h1>
@stop

@section('content')
    <x-aminblog.alert/>
    <div class="card">
        <div class="card-body">
            {!! Form::model($anuncio,['route'=>['admin.blog.announce.update',$anuncio],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                @include('admin.partiels.notice')
                {!! Form::submit('Actualizar Anuncio', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
