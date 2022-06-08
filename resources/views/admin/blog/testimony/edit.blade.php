@extends('adminlte::page')

@section('title', 'Editar Testimonio')

@section('content_header')
    <h1>Editar Testimonio</h1>
    
@stop

@section('content')
    <x-aminblog.alert/>
    <div class="card">
        <div class="card-body">
            {!! Form::model($testimony,['route'=>['admin.blog.testimony.update',$testimony],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                @include('admin.partiels.testimony')
                {!! Form::submit('Actualizar Testimonio', ['class'=>'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

<x-aminblog.cssjs/>

