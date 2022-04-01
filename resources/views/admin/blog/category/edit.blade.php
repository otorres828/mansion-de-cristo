@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<x-aminblog.alert/>

<div class="card">
    <div class="card-body">
        {!! Form::model($category,['route'=>['admin.blog.category.update',$category],'autocomplete'=>'off','method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'NOMBRE DE LA CATEGORIA',) !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre Categoria']) !!}           
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror    
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'SLUG',) !!}
                {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'SLUG','readonly']) !!}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Actualizar Categoria', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
    <script>
        console.log('Hi!');
    </script>

    <script src="{{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}}"></script>

    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>
@stop
