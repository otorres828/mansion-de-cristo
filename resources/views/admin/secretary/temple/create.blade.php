@extends('adminlte::page')

@section('title', 'Crear Iglesia Hija')

@section('content_header')
    <h1 class=" mt-2"><strong>REGISTRE UNA NUEVA IGLESIA HIJA</strong></h1>
@stop

@section('content')
    
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.secretary.temple.store','autocomplete'=>'off']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre de la Iglesia',) !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre iglesia hija']) !!}           
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug',) !!}
                {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'SLUG','readonly']) !!}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('represent', 'Nombre del representante de la iglesia',) !!}
                {!! Form::text('represent', null, ['class'=>'form-control','placeholder'=>'Ingrese del representante de la iglesia hija']) !!}           
                @error('represent')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico',) !!}
                {!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Ingrese del correo electronico']) !!}           
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <x-jet-label value="{{ __('Clave') }}" />
            
                <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                             name="password" required autocomplete="new-password" />
                <x-jet-input-error for="password"></x-jet-input-error>
            </div>
            {!! Form::submit('Crear Iglesia', ['class'=>'btn btn-primary']) !!}
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
