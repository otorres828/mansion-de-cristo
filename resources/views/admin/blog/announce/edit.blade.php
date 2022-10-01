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
                <button type="submit"  class="actualizar btn btn-primary float-right">Actualizar Noticia</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>
